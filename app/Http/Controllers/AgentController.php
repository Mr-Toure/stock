<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
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
        $services = Service::pluck('libelle', 'id');
        return view('agent.create', compact(['agent', 'services']));
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
            "service_id" => $request->service_id,
            "picture" => $request->picture,
        ]);

        return redirect()->route('agents.index')
            ->with('success', 'Agent created successfully.');
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

        return redirect()->route('agents.index')
            ->with('success', 'Agent updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $agent = Agent::find($id)->delete();

        return redirect()->route('agents.index')
            ->with('success', 'Agent deleted successfully');
    }
}
