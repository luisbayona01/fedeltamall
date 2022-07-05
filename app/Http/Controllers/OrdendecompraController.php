<?php

namespace App\Http\Controllers;

use App\Models\Ordendecompra;
use Illuminate\Http\Request;
use  DB;
/**
 * Class OrdendecompraController
 * @package App\Http\Controllers
 */
class OrdendecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function deleteorden(Request $request)
    {    $idordendecompra=$request->idordendecompra;
          $delete=DB::table('ordendecompra')->where("idordendecompra", $idordendecompra )->delete();
         return $delete;
    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function edidcantidad(Request $request)
    {     //print_r($_POST);
       
        
        $idordendecompra=$request->idordendecompra;
        $cantidad=$request->cantidad;
        //$data = Ordendecompra::where('idordendecompra', '=',  $idordendecompra)->get();
       $totalorden=$cantidad * $request->precioU;
       //echo  $totalorden;
        $updateOrdendecompra= DB::table('ordendecompra')->where("idordendecompra", $idordendecompra)->update(["cantidad"=>$cantidad,"totalorden"=>$totalorden,"estado"=>1]);
       
        return $updateOrdendecompra;
    }

    
    public function addordencompra(Request $request)
    {   //print_r($_POST);
  
        $data = Ordendecompra::where('idproducto', '=', $request->idproductos)->get();
        
        //print_r($data);

        //Array ( [idproductos] => 3 [precio] => 3000 [idusuario] => 7 [cantidad] => 1 )
        
        if (count($data)!= 0) {



        $idordendecompra=$data[0]['idordendecompra'];
        $cantidad=$data[0]['cantidad'] + $request->cantidad;
        $totalorden=$cantidad * $request->precio;
         //echo  $cantidad;
        //$Ordendecompra =new  Ordendecompra()
     
        //$ordendecompra = Ordendecompra::where('idordendecompra', '=' ,$idordendecompra);
        //$ordendecompra->idproducto=$request->idproductos;
        //$ordendecompra->cantidad=;
        //$ordendecompra->totalorden= $totalorden;
        //$ordendecompra->estado=1;
        //$ordendecompra->idusuario=$request->idusuario;
       $Ordendecompra= DB::table('ordendecompra')->where("idordendecompra", $idordendecompra)->update(["idproducto" => $request->idproductos,"cantidad"=>$cantidad,"totalorden"=>$totalorden,"estado"=>1,"idusuario"=>$request->idusuario]);
       
        return $Ordendecompra;

        } else{
           
         
        
            $totalorden=$request->cantidad * $request->precio;
            $Ordendecompra =new  Ordendecompra ([ 
                'idproducto'=>$request->idproductos,
                'cantidad'=>$request->cantidad,
                'totalorden'=> $totalorden,
                'estado'=>1,
                'idusuario'=>$request->idusuario,
               

            ]); 

            if ($Ordendecompra->save()){
                
                $menssage="orden de registrada";
                return response()->json([
                    'ok'    => true,
                    'menssage'  => $menssage
                   
                ]);

        }
    }
  
        //request()->validate(Ordendecompra::$rules);


        //$ordendecompra = Ordendecompra::create($request->all());
          
       
       // return redirect()->route('ordendecompras.index')
           // ->with('success', 'Ordendecompra created successfully.');
    }

    /**
     * Display the specified resource.
     *
    // * @param  int $id
     //* @return \Illuminate\Http\Response
     */
    public function showord(Request $request )

    {  

       $datacarrito= DB::table('carritodcompra')->where('idusuario', $request->id)
        ->where('estado','=','1')->get();
        return  $datacarrito;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordendecompra = Ordendecompra::find($id);

        return view('ordendecompra.edit', compact('ordendecompra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ordendecompra $ordendecompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordendecompra $ordendecompra)
    {
        request()->validate(Ordendecompra::$rules);

        $ordendecompra->update($request->all());

        return redirect()->route('ordendecompras.index')
            ->with('success', 'Ordendecompra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ordendecompra = Ordendecompra::find($id)->delete();

        return redirect()->route('ordendecompras.index')
            ->with('success', 'Ordendecompra deleted successfully');
    }
}
