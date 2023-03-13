<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Typefour;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
/**
 * Class TypefourController
 * @package App\Http\Controllers
 */
class TypefourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typefours = Typefour::paginate();

        return view('typefour.index', compact('typefours'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typefour = new Typefour();
        $familles = Famille::pluck('libelle', 'id');
        return view('typefour.create', compact(['typefour', 'familles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Typefour::$rules);

        $typefour = Typefour::create($request->all());
        toast('Le Type famille a été crée ','success');
        return redirect()->route('typefours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*  public function show($id)
    {
        $typefour = Typefour::find($id);

        return view('typefour.show', compact('typefour'));
    }
   */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typefour = Typefour::find($id);
        $familles = Famille::pluck('libelle', 'id');
        return view('typefour.edit', compact(['typefour', 'familles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Typefour $typefour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typefour $typefour)
    {
        request()->validate(Typefour::$rules);

        $typefour->update($request->all());
        toast('Le Type famille a été mis à jour ','success');
        return redirect()->route('typefours.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $typefour = Typefour::find($id)->delete();
            toast('Le Type famille a été supprimé','success');
            return redirect()->route('typefours.index');
        } catch (QueryException $ex) {
            toast('Le Type famille ne peut être supprimer','error');
            return redirect()->route('typefours.index');
        }
    }
}
