<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

/**
 * Class DirectionController
 * @package App\Http\Controllers
 */
class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Direction::all();

        return view('direction.index', compact('directions'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = new Direction();
        return view('direction.create', compact('direction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Direction::$rules);

        $direction = Direction::create($request->all());

        return redirect()->route('directions.index')
            ->with('success', 'Direction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direction = Direction::find($id);

        return view('direction.show', compact('direction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direction = Direction::find($id);

        return view('direction.edit', compact('direction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        request()->validate(Direction::$rules);

        $direction->update($request->all());

        return redirect()->route('directions.index')
            ->with('success', 'Direction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $direction = Direction::find($id)->delete();

        return redirect()->route('directions.index')
            ->with('success', 'Direction deleted successfully');
    }
}
