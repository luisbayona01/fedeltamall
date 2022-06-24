<?php

namespace App\Http\Controllers;

use App\Models\Categoriatienda;
use Illuminate\Http\Request;

/**
 * Class CategoriatiendaController
 * @package App\Http\Controllers
 */
class CategoriatiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriatiendas = Categoriatienda::paginate();

        return view('categoriatienda.index', compact('categoriatiendas'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriatiendas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriatienda = new Categoriatienda();
        return view('categoriatienda.create', compact('categoriatienda'));
}
    public function  showallcategorias(){
        $categoriatiendas = Categoriatienda::all();
         return $categoriatiendas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categoriatienda::$rules);

        $categoriatienda = Categoriatienda::create($request->all());

        return redirect()->route('categoriatiendas.index')
            ->with('success', 'Categoriatienda created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriatienda = Categoriatienda::find($id);

        return view('categoriatienda.show', compact('categoriatienda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriatienda = Categoriatienda::find($id);

        return view('categoriatienda.edit', compact('categoriatienda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoriatienda $categoriatienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriatienda $categoriatienda)
    {
        request()->validate(Categoriatienda::$rules);

        $categoriatienda->update($request->all());

        return redirect()->route('categoriatiendas.index')
            ->with('success', 'Categoriatienda updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriatienda = Categoriatienda::find($id)->delete();

        return redirect()->route('categoriatiendas.index')
            ->with('success', 'Categoriatienda deleted successfully');
    }
}
