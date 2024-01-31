<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Fonction;
use App\Models\Service;
use App\Models\Ssdirection;
use Illuminate\Http\Request;

/**
 * Class FonctionController
 * @package App\Http\Controllers
 */
class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::with('direction')->get();

        return view('fonction.index', compact('fonctions'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonction = new Fonction();
        $directions = Direction::pluck('libelle', 'id');
        $ssdirections = Ssdirection::pluck('libelle', 'id');
        $services = Service::pluck('libelle', 'id');
        return view('fonction.create', compact('fonction', 'directions', 'ssdirections', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fonction::$rules);

        $fonction = Fonction::create($request->all());

        return redirect()->route('fonctions.index')
            ->with('success', 'Fonction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonction = Fonction::find($id);

        return view('fonction.show', compact('fonction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fonction = Fonction::find($id);

        return view('fonction.edit', compact('fonction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fonction $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        request()->validate(Fonction::$rules);

        $fonction->update($request->all());

        return redirect()->route('fonctions.index')
            ->with('success', 'Fonction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fonction = Fonction::find($id)->delete();

        return redirect()->route('fonctions.index')
            ->with('success', 'Fonction deleted successfully');
    }
}
