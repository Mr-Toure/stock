<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Ssdirection;
use Illuminate\Http\Request;

/**
 * Class SsdirectionController
 * @package App\Http\Controllers
 */
class SsdirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ssdirections = Ssdirection::all();
        $directions = Direction::all();
        return view('ssdirection.index', compact(['ssdirections', 'directions']))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ssdirection = new Ssdirection();
        $directions = Direction::pluck('libelle', 'id');
        //dd($directions);
        return view('ssdirection.create', compact(['ssdirection', 'directions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ssdirection::$rules);

        $ssdirection = Ssdirection::create($request->all());

        return redirect()->route('ssdirections.index')
            ->with('success', 'Ssdirection created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ssdirection = Ssdirection::find($id);

        return view('ssdirection.show', compact('ssdirection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ssdirection = Ssdirection::find($id);
        $directions = Direction::pluck('libelle', 'id');
        return view('ssdirection.edit', compact(['ssdirection', 'directions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ssdirection $ssdirection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ssdirection $ssdirection)
    {
        request()->validate(Ssdirection::$rules);

        $ssdirection->update($request->all());

        return redirect()->route('ssdirections.index')
            ->with('success', 'Ssdirection updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ssdirection = Ssdirection::find($id)->delete();

        return redirect()->route('ssdirections.index')
            ->with('success', 'Ssdirection deleted successfully');
    }
}
