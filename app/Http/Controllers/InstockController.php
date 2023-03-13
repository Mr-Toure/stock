<?php

namespace App\Http\Controllers;

use App\Models\Instock;
use Illuminate\Http\Request;

/**
 * Class InstockController
 * @package App\Http\Controllers
 */
class InstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instocks = Instock::paginate();

        return view('instock.index', compact('instocks'))
            ->with('i', (request()->input('page', 1) - 1) * $instocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instock = new Instock();
        return view('instock.create', compact('instock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Instock::$rules);

        $instock = Instock::create($request->all());

        return redirect()->route('instocks.index')
            ->with('success', 'Instock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instock = Instock::find($id);

        return view('instock.show', compact('instock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instock = Instock::find($id);

        return view('instock.edit', compact('instock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Instock $instock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instock $instock)
    {
        request()->validate(Instock::$rules);

        $instock->update($request->all());

        return redirect()->route('instocks.index')
            ->with('success', 'Instock updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $instock = Instock::find($id)->delete();

        return redirect()->route('instocks.index')
            ->with('success', 'Instock deleted successfully');
    }
}
