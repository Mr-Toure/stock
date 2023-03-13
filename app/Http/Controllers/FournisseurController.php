<?php

namespace App\Http\Controllers;

use App\Models\Typefour;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
/**
 * Class FournisseurController
 * @package App\Http\Controllers
 */
class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::paginate();

        return view('fournisseur.index', compact('fournisseurs'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseur = new Fournisseur();
        $typefours = Typefour::pluck('libelle', 'id');
        return view('fournisseur.create', compact(['fournisseur', 'typefours']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fournisseur::$rules);
        //dd($request->all());
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'founisseur_'.time().'.'.$extenstion;
            $file->move('storage/founisseurs/', $filename);
            $request->picture = "storage/founisseurs/".$filename;
            //dd($request->picture);
        }else{
            $request->picture = null;
        }

        //dd($request->all());
        $fournisseur = Fournisseur::create([
            "name" =>$request->name,
            "town" => $request->town,
            "phone" => $request->phone,
            "picture" =>$request->picture,
        ]);

        return redirect()->route('fournisseurs.index')
            ->with('success', 'Fournisseur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::find($id);

        return view('fournisseur.show', compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);
        $typefours = Typefour::pluck('libelle', 'id');
        return view('fournisseur.edit', compact(['fournisseur', 'typefours']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        request()->validate(Fournisseur::$rules);
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'founisseur_'.time().'.'.$extenstion;
            $file->move('storage/founisseurs/', $filename);
            $request->picture = "storage/founisseurs/".$filename;
        }else{
            $request->picture = $fournisseur->picture;
        }

        $fournisseur->update([
            "name" =>$request->name,
            "town" => $request->town,
            "phone" => $request->phone,
            "typefour_id" => $request->typefour_id,
            "picture" =>$request->picture,
        ]);

        return redirect()->route('fournisseurs.index')
            ->with('success', 'Fournisseur updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

            try {
                $fournisseur = Fournisseur::find($id)->delete();
                toast('Le Fournisseur a été supprimé','success');

                return redirect()->route('fournisseurs.index');
            } catch (QueryException $ex) {
                toast('Le Fournisseur ne peut être supprimer','error');
                return redirect()->route('fournisseurs.index');
            }
    }
}
