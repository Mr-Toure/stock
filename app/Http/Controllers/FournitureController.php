<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Models\Typefour;
use App\Models\Fourniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class FournitureController
 * @package App\Http\Controllers
 */
class FournitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournitures = Fourniture::all();

        return view('fourniture.index', compact('fournitures'))->with('i');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encres()
    {
        $fournitures = Fourniture::where('typefour_id',5)->get();

        return view('fourniture.index', compact('fournitures'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fourniture = new Fourniture();
        $typefours = Typefour::pluck('libelle', 'id');
        $printers = Printer::pluck('name', 'id');
        return view('fourniture.create', compact(['fourniture', 'typefours', 'printers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fourniture::$rules);
        DB::transaction(function () use ($request): void {
            if($request->hasfile('picture'))
            {
                $file = $request->file('picture');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'fourniture_'.time().'.'.$extenstion;
                $file->move('storage/fournitures/', $filename);
                $request->picture = "storage/fournitures/".$filename;
            }else{
                $request->picture = null;
            }

            //dd($request->all());
            $fourniture = Fourniture::create([
                "designation" => $request->designation,
                "marque" => $request->marque,
                "reference" => $request->reference,
                "caracteristique" => $request->caracteristique,
                "qte_seuil" => $request->qte_seuil,
                "c_moyen_achat" => $request->c_moyen_achat,
                "typefour_id" => $request->typefour_id,
                "picture" =>$request->picture,
            ]);
            !request('printer') ? '' : $fourniture->printers()->attach(request('printer'));
        });


        return redirect()->route('fournitures.index')
            ->with('success', 'Fourniture created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fourniture = Fourniture::find($id);

        return view('fourniture.show', compact('fourniture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fourniture = Fourniture::find($id);
        $typefours = Typefour::pluck('libelle', 'id');
        $printers = Printer::pluck('name', 'id');
        return view('fourniture.edit', compact(['fourniture', 'typefours', 'printers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fourniture $fourniture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fourniture $fourniture)
    {
        DB::transaction(function () use ($request, $fourniture): void {
            request()->validate(Fourniture::$rules);
            if($request->hasfile('picture'))
            {
                $file = $request->file('picture');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'fourniture_'.time().'.'.$extenstion;
                $file->move('storage/fournitures/', $filename);
                $request->picture = "storage/fournitures/".$filename;

            }else{
                $request->picture = $fourniture->picture;
            }
            $fourniture->update([
                "designation" => $request->designation,
                "marque" => $request->marque,
                "reference" => $request->reference,
                "caracteristique" => $request->caracteristique,
                "qte_seuil" => $request->qte_seuil,
                "c_moyen_achat" => $request->c_moyen_achat,
                "typefour_id" => $request->typefour_id,
                "picture" =>$request->picture,
            ]);
        });

        return redirect()->route('fournitures.index')
            ->with('success', 'Fourniture updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fourniture = Fourniture::find($id)->delete();

        return redirect()->route('fournitures.index')
            ->with('success', 'Fourniture deleted successfully');
    }
}
