@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Categoriaproducto</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

              

                <div class="card card-default">
                   
                    <div class="card-body">
                        <form method="POST" action="{{url('categoriastore')}}" role="form" enctype="multipart/form-data">
                            @csrf

                            
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('categoria') }}
                                        {{ Form::text('categoria', $categoriaproducto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
                                       
                                    </div>
                                   
                                  

                                        


                                        <?php  
                                        if( is_null(session('iduseradmintienda'))){
                                      
                                      ?> 
                                      <div class="form-group">
                                        {{ Form::label('tienda') }}
                                      <select class="form-control" name="idtienda" required>
                                        <option value="">selecione </option>
                                        @foreach ($tienda as $tienda)
                                        <option value="{{$tienda->idtiendas}}">{{$tienda->nombre}} </option>
                                        @endforeach
                                      </select> 
    
                                   

                                    </div>

                                       <?php }else{
                                       $tiendas=session('iduseradmintienda');
                                    ?>
                               
                               <input type="hidden" name="idtienda" value="{{session('iduseradmintienda')}}"> 
                                   <?php
                                        }
                                         ?>
                            
                                </div>
                              
                            </div>
                     
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        
    </section>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ url('/css/admin_custom.css')}}">
    @stop
    