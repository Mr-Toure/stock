<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use App\Models\Ssdirection;
use Illuminate\Http\Request;

/**
 * Class AgentController
 * @package App\Http\Controllers
 */
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::paginate();
        //dd( $agents->service);
        return view('agent.index', compact('agents'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = new Agent();
        $ssdirection = Ssdirection::pluck('libelle', 'id');
        return view('agent.create', compact(['agent', 'ssdirection']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Agent::$rules);

        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'agent_'.time().'.'.$extenstion;
            $file->move('storage/agent/', $filename);
            $request->picture = "storage/agent/".$filename;
        }else{
            $request->picture = null;
        }
        //dd($request->all());
        $agent = Agent::create([
            "name" => $request->name,
            "surname" => $request->surname,
            "email" => $request->email,
            "matricule" => $request->matricule,
            "phone" => $request->phone,
            "post" => $request->post,
            "ssdirection_id" => $request->ssdirection_id,
            "picture" => $request->picture,
        ]);
        toast('Bravo! agent ajouté','success');
        return redirect()->route('agents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);

        return view('agent.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        $services = Service::pluck('libelle', 'id');
        return view('agent.edit', compact(['agent', 'services']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        request()->validate(Agent::$rules);
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'agent_'.time().'.'.$extenstion;
            $file->move('storage/agent/', $filename);
            $request->picture = "storage/agent/".$filename;
        }else{
            $request->picture = $agent->picture;
        }
        $agent->update([
            "name" => $request->name,
            "surname" => $request->surname,
            "email" => $request->email,
            "matricule" => $request->matricule,
            "phone" => $request->phone,
            "post" => $request->post,
            "service_id" => $request->service_id,
            "picture" => $request->picture,
        ]);
        toast('Félicitation! information agent mise à jour','success');
        return redirect()->route('agents.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $agent = Agent::find($id)->delete();
        toast('Bravo! agent revoqué','error');
        return redirect()->route('agents.index');
    }
}
