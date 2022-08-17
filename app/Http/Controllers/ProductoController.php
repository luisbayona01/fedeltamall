<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoriaproducto;
use App\Models\Tienda;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos =  Producto::join('categoriaproductos', 'categoriaproductos.idcategoria', '=', 'productos.idcategoria')
        ->join('tiendas','tiendas.idtiendas','=','productos.idtienda')
        ->where('productos.idtienda', '=',session('iduseradmintienda'))
        ->get(['productos.*', 'categoriaproductos.categoria','tiendas.nombre as tiendas']);
      
           //return $productos; 

        return view('producto.index', compact('productos'));
            ///->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    public function create()
    {
        $producto= new Producto();
        $tienda= Tienda::all();
        $categoriaproducto=Categoriaproducto::all();  
        //return $productos; 

        return view('producto.create', compact('producto','tienda','categoriaproducto'));
            ///->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    request()->validate(Producto::$rules);
        
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
       
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
         $public_path = base_path();
         //$filename = $public_path.'/storage/app/public/imagenes'.$nombre;
         $imagen=  request()->getSchemeAndHttpHost()."/fedeltamall/storage/app/public/imagenes/$nombre";
       //die();
        $productos= new producto();
        $productos->nombre=$request->nombre;
        $productos->descripcion= $request->descripcion;
        $productos->precio=$request->precio;
        $productos->imagen=$imagen;
        $productos->idtienda=$request->idtienda;
        $productos->idcategoria=$request->idcategoria;
        if($productos->save()){

            return redirect()->route('productos')->with('success', 'Producto created successfully.');
        }


    } 
 public function allproductTienda(Request $request){
   //print_r($_POST);
     //die();
    $tienda = $request->input('idtienda'); 
   
    $productoTienda= producto ::where('idtienda', '=', $tienda)->get();
    
    return  $productoTienda;
    //var_dump ($productoTienda);
 }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$producto = Producto::find($id);
        $productoTienda= producto ::where('idtienda', '=',$producto->idtienda)->get();
        return view('producto.show', compact('producto','tienda','categoriaproducto');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     //* @param  int $id
     //* @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
         //$tienda = $request->input('idtienda'); 
        $producto = Producto::where('idproductos','=',$id)->first();
        $tienda= Tienda::all();
        $categoriaproducto=Categoriaproducto::all();      
        return view('producto.edit',compact('producto','tienda','categoriaproducto'));
    }

   
    public function update(Request $request)
    {     //ini_set('memory_limit', '-1');
        $file = $request->file('file');
        $id=$request->input('idproductos');
        $productos =Producto::find($id);
        if(!is_null($file)){
            $nombre = $file->getClientOriginalName();
       
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));
             $public_path = base_path();
             $imagen=  request()->getSchemeAndHttpHost()."/fedeltamall/storage/app/public/imagenes/$nombre";
             $productos->nombre=$request->nombre;
             $productos->descripcion= $request->descripcion;
             $productos->precio=$request->precio;
             $productos->imagen=$imagen;
             $productos->idtienda=$request->idtienda;
             $productos->idcategoria=$request->idcategoria;
           
        }else{

            $productos->nombre=$request->nombre;
            $productos->descripcion= $request->descripcion;
            $productos->precio=$request->precio;
            //$productos->imagen=$imagen;
            $productos->idtienda=$request->idtienda;
            $productos->idcategoria=$request->idcategoria;
        }

        //obtenemos el nombre del archivo
         //$filename = $public_path.'/storage/app/public/imagenes'.$nombre;
         
    
     
       


        if($productos->save()){

            return redirect()->route('productos')->with('success', 'Producto created successfully.');
        }

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos')
            ->with('success', 'Producto deleted successfully');
    }
}
