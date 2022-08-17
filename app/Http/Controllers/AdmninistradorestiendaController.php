<?php

namespace App\Http\Controllers;

use App\Models\Admninistradorestienda;
use Illuminate\Http\Request;
use App\Models\Tienda;
/**
 * Class AdmninistradorestiendaController
 * @package App\Http\Controllers
 */
class AdmninistradorestiendaController extends Controller
{
    
    public function index()
    {   
      if(is_null(session('iduseradmintienda'))){
        $admninistradorestiendas = Admninistradorestienda::join('tiendas','tiendas.idtiendas','=','admninistradorestienda.idtienda')
        ->get(['admninistradorestienda.*','tiendas.nombre as tiendas']);
        }else{

            $admninistradorestiendas = Admninistradorestienda::join('tiendas','tiendas.idtiendas','=','admninistradorestienda.idtienda')
            ->where('admninistradorestienda.idtienda', '=',session('iduseradmintienda'))
            ->get(['admninistradorestienda.*','tiendas.nombre as tiendas']);
               
        }
        return view('admninistradorestienda.index', compact('admninistradorestiendas'));
    }

    public function create()
    {   
        $admninistradorestienda = new Admninistradorestienda();
        $tienda=Tienda::all();
        return view('admninistradorestienda.create', compact('admninistradorestienda','tienda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        request()->validate(Admninistradorestienda::$rules);

        $admninistradorestienda = Admninistradorestienda::create($request->all());

        return redirect()->route('administradorestienda')
            ->with('success', 'Admninistradorestienda created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admninistradorestienda = Admninistradorestienda::find($id);

        return view('admninistradorestienda.show', compact('admninistradorestienda'));
    }

  
    public function edit($id)
    {
        $admninistradorestienda = Admninistradorestienda::find($id);
        $tienda=Tienda::all();
        return view('admninistradorestienda.edit', compact('admninistradorestienda','tienda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Admninistradorestienda $admninistradorestienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        if(is_null($request->idtienda)){
         $tienda=session('iduseradmintienda');
          }  

        //request()->validate(Admninistradorestienda::$rules);
        $id= $request->idadmninistradorestienda;   
        $admninistradorestienda=Admninistradorestienda::find($id);
        $admninistradorestienda->nombre=$request->nombre; 
        $admninistradorestienda->correoelectronico=$request->correoelectronico; 
        $admninistradorestienda->idtienda= $tienda; 
        $admninistradorestienda->identificacion=$request->identificacion;
        $admninistradorestienda->save();
        return redirect()->route('administradorestienda')
            ->with('success', 'Admninistradorestienda updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $admninistradorestienda = Admninistradorestienda::find($id)->delete();

        return redirect()->route('administradorestienda')
            ->with('success', 'Admninistradorestienda deleted successfully');
    }
}
