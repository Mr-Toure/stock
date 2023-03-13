<?php

namespace App\Http\Controllers;

use App\Models\Bonreception;
use Illuminate\Http\Request;

/**
 * Class BonreceptionController
 * @package App\Http\Controllers
 */
class BonreceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonreceptions = Bonreception::paginate();

        return view('bonreception.index', compact('bonreceptions'))
            ->with('i', (request()->input('page', 1) - 1) * $bonreceptions->perPage());
    }

    public function auth(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bonreception = new Bonreception();
        return view('bonreception.create', compact('bonreception'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        request()->validate(Bonreception::$rules);

        $bonreception = Bonreception::create($request->all());

        return redirect()->route('bonreceptions.index')
            ->with('success', 'Bonreception created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bonreception = Bonreception::find($id);

        return view('bonreception.show', compact('bonreception'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonreception = Bonreception::find($id);

        return view('bonreception.edit', compact('bonreception'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bonreception $bonreception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonreception $bonreception)
    {
        request()->validate(Bonreception::$rules);

        $bonreception->update($request->all());

        return redirect()->route('bonreceptions.index')
            ->with('success', 'Bonreception updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bonreception = Bonreception::find($id)->delete();

        return redirect()->route('bonreceptions.index')
            ->with('success', 'Bonreception deleted successfully');
    }
}
