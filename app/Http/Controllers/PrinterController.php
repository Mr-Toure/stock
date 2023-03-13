<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PrinterController
 * @package App\Http\Controllers
 */
class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers = Printer::paginate();

        return view('printer.index', compact('printers'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $printer = new Printer();

        $agents = Agent::select("id", DB::raw("CONCAT(agents.name,' ',agents.surname) as full_name"))
        ->pluck('full_name', 'id');

        return view('printer.create', compact(['printer', 'agents']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Printer::$rules);
            DB::transaction(function () use ($request): void {
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
                $printer = Printer::create([
                    "name" => $request->name,
                    "reference" => $request->reference,
                    "marque" => $request->marque,
                    "type" => $request->type,
                    "agent_id" => $request->agent_id,
                    "picture" => $request->picture ,
                ]);
        });


        return redirect()->route('printers.index')
            ->with('success', 'Printer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $printer = Printer::find($id);

        return view('printer.show', compact('printer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $printer = Printer::find($id);
        $agents = Agent::select("id", DB::raw("CONCAT(agents.name,' ',agents.surname) as full_name"))
        ->pluck('full_name', 'id');
        return view('printer.edit', compact(['printer', 'agents']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Printer $printer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Printer $printer)
    {
        request()->validate(Printer::$rules);
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'agent_'.time().'.'.$extenstion;
            $file->move('storage/agent/', $filename);
            $request->picture = "storage/agent/".$filename;
        }else{
            $request->picture = $printer->picture;
        }
        $printer->update([
            "name" => $request->name,
            "reference" => $request->reference,
            "marque" => $request->marque,
            "type" => $request->type,
            "agent_id" => $request->agent_id,
            "picture" => $request->picture ,
        ]);

        return redirect()->route('printers.index')
            ->with('success', 'Printer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $printer = Printer::find($id)->delete();

        return redirect()->route('printers.index')
            ->with('success', 'Printer deleted successfully');
    }
}
