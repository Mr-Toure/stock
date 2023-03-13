<?php

namespace App\Http\Controllers;

use App\Models\Bonlivraison;
use Illuminate\Http\Request;

/**
 * Class BonlivraisonController
 * @package App\Http\Controllers
 */
class BonlivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonlivraisons = Bonlivraison::paginate();

        return view('bonlivraison.index', compact('bonlivraisons'))
            ->with('i', (request()->input('page', 1) - 1) * $bonlivraisons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bonlivraison = new Bonlivraison();
        return view('bonlivraison.create', compact('bonlivraison'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bonlivraison::$rules);

        $bonlivraison = Bonlivraison::create($request->all());

        return redirect()->route('bonlivraisons.index')
            ->with('success', 'Bonlivraison created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bonlivraison = Bonlivraison::find($id);

        return view('bonlivraison.show', compact('bonlivraison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonlivraison = Bonlivraison::find($id);

        return view('bonlivraison.edit', compact('bonlivraison'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bonlivraison $bonlivraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonlivraison $bonlivraison)
    {
        request()->validate(Bonlivraison::$rules);

        $bonlivraison->update($request->all());

        return redirect()->route('bonlivraisons.index')
            ->with('success', 'Bonlivraison updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bonlivraison = Bonlivraison::find($id)->delete();

        return redirect()->route('bonlivraisons.index')
            ->with('success', 'Bonlivraison deleted successfully');
    }
}
