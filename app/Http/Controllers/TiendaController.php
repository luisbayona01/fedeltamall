<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;
use App\Models\Categoriatienda;
/**
 * Class TiendaController
 * @package App\Http\Controllers
 */
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     
     */
    public function index()
    {
        //$tiendas = Tienda::paginate();
        $tiendas=Tienda::join('categoriatiendas', 'categoriatiendas.idcategoriatienda', '=', 'tiendas.tiendacategoria')
        
        ->get(['tiendas.*', 'categoriatiendas.nombre as tiendacategorias']);
      
        return view('tienda.index', compact('tiendas'));
    }

   
    public function create()
    {
        $tienda = new Tienda();
        $categoriasTienda=Categoriatienda::all();
        return view('tienda.create', compact('tienda','categoriasTienda'));
    }

     
    public function store(Request $request)
    {   request()->validate(Tienda::$rules);
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
       
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('logos')->put($nombre,  \File::get($file));
         $public_path = base_path();
         //$filename = $public_path.'/storage/app/public/imagenes'.$nombre;
         $imagen=  request()->getSchemeAndHttpHost()."/fedeltamall/storage/app/public/logostiendas/$nombre";
       //die();
      


 

        $tienda = Tienda::create([
        'nombre'=>$request->nombre,
        'logo'=> $imagen,
        'tiendacategoria'=>$request->categoriatienda
        ]);

        return redirect()->route('tiendas')
            ->with('success', 'Tienda created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.show', compact('tienda'));
    }


    public function edit($id)
    { 
        $tienda = Tienda::find($id);
        $categoriasTienda=Categoriatienda::all();

      return view('tienda.edit', compact('tienda','categoriasTienda'));
    }


    public  function Showall(){
    $tiendas= Tienda::all();
    return $tiendas; 

    }
    
 
    public function update(Request $request)
    {
        $file = $request->file('file');
        $id=$request->input('idtiendas');
        $tiendas =Tienda::find($id);
        if(!is_null($file)){
            $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
       
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('logos')->put($nombre,  \File::get($file));
         $public_path = base_path();
         //$filename = $public_path.'/storage/app/public/imagenes'.$nombre;
         $imagen=  request()->getSchemeAndHttpHost()."/fedeltamall/storage/app/public/logostiendas/$nombre";
             $tiendas->nombre=$request->nombre;
             
             $tiendas->logo=$imagen;
            
             $tiendas->tiendacategoria=$request->idtiendas;
           
        }else{

            $tiendas->nombre=$request->nombre;
             
           $tiendas->tiendacategoria=$request->idtiendas;
        }


        if($tiendas->save()){

            return redirect()->route('tiendas')->with('success', 'tienda created successfully.');
        }
    }
/**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {  
        $tienda = Tienda::find($id)->delete();

        return redirect()->route('tiendas')
            ->with('success', 'Tienda deleted successfully');
    }
}
