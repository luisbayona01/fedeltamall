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
    
    public function index()
    {
        $categoriatiendas = Categoriatienda::all();

        return view('categoriatienda.index', compact('categoriatiendas'));
            
    }

   
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

        return redirect()->route('categoriatiendas')
            ->with('success', 'Categoriatienda created successfully.');
    }

  
 

    
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
    public function update(Request $request)
    {
        //request()->validate(Categoriatienda::$rules);

        $id=$request->categoriatiendaid;
        $categoriatienda = Categoriatienda::find($id);
        //dd($categoriatienda );
        $categoriatienda->nombre=$request->nombre;
        $categoriatienda->save();

        return redirect()->route('categoriatiendas')
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

        return redirect()->route('categoriatiendas')
            ->with('success', 'Categoriatienda deleted successfully');
    }
}
