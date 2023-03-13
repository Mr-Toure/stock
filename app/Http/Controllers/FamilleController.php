<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
/**
 * Class FamilleController
 * @package App\Http\Controllers
 */
class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::paginate();

        return view('famille.index', compact('familles'))
            ->with('i', (request()->input('page', 1) - 1) * $familles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $famille = new Famille();
        return view('famille.create', compact('famille'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Famille::$rules);
        $famille = Famille::create($request->all());
        toast('Famille crée avec success','success');
        return redirect()->route('familles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*  public function show($id)
    {
        $famille = Famille::find($id);

        return view('famille.show', compact('famille'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $famille = Famille::find($id);

        return view('famille.edit', compact('famille'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Famille $famille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Famille $famille)
    {
        request()->validate(Famille::$rules);

        $famille->update($request->all());
        toast('Famille mise à jour avec success','success');
        return redirect()->route('familles.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $famille = Famille::find($id)->delete();
            toast('La famille a été supprimé','success');
            return redirect()->route('familles.index');
        } catch (QueryException $ex) {
            toast('La famille ne peut être supprimer','error');
            return redirect()->route('familles.index');
        }

    }
}
