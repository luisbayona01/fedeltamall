<?php

namespace App\Http\Controllers;

use App\Models\Categoriaproducto;
use App\Models\Tienda;
use Illuminate\Http\Request;

/**
 * Class CategoriaproductoController
 * @package App\Http\Controllers
 */
class CategoriaproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function index()
    {
      

       
      
        $categoriaproductos= Categoriaproducto::join('tiendas','tiendas.idtiendas','=','categoriaproductos.idtiendacategoriap')
        ->where('categoriaproductos.idtiendacategoriap', '=',session('iduseradmintienda'))
        ->get(['categoriaproductos.*', 'tiendas.nombre as tiendas']);
        
        //dd($categoriaproductos);
        return view('categoriaproducto.index', compact('categoriaproductos'));
            //->with('i', (request()->input('page', 1) - 1) * $categoriaproductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categoriaproducto = new Categoriaproducto();
        $tienda= Tienda::all();
        // ->where('admninistradorestienda.idtienda', '=',session('iduseradmintienda'))
        return view('categoriaproducto.create', compact('categoriaproducto','tienda'));
    }

    public function allcategoriaTienda(Request $request){
        $tienda = $request->input('idtienda'); 
       
        $categoriaproductosTienda= Categoriaproducto ::where('idtiendacategoriap', '=', $tienda)->get();
        
        return  $categoriaproductosTienda;
        //var_dump ($productoTienda);
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categoriaproducto::$rules);
       
        $categoriaproducto = Categoriaproducto::create([
            'categoria'=>$request->categoria,
            'idtiendacategoriap'=>$request->idtienda
        ]);

        return redirect()->route('categoriaproductos')->with('success', 'Categoriaproducto created successfully.');
       
    }

    /*public function show($id)
    {
        $categoriaproducto = Categoriaproducto::find($id);

        return view('categoriaproducto.show', compact('categoriaproducto'));
    }*/

    
    public function edit($id)
    {
        $categoriaproducto = Categoriaproducto::find($id);
        $tienda= Tienda::all();
        return view('categoriaproducto.edit', compact('categoriaproducto','tienda'));
    }

    public function update(Request $request)
    {
       // request()->validate(Categoriaproducto::$rules);
        $id=$request->idcategoria;

        $categoriaproducto =Categoriaproducto::find($id);;
        $categoriaproducto->categoria=$request->categoria;
        $categoriaproducto->idtiendacategoriap= $request->idtienda;
        if($categoriaproducto->save()){

            return redirect()->route('categoriaproductos')->with('success', 'Categoriaproducto created successfully.');
        }
        }
        

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriaproducto = Categoriaproducto::find($id)->delete();

        return redirect()->route('categoriaproductos')->with('success', 'Categoriaproducto created successfully.');
    }
}
