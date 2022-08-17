@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>   Update Categoriaproducto</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Categoriaproducto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/updatecategorias') }}"  role="form" enctype="multipart/form-data">
                           
                            @csrf

                            <div class="box-body">
                                    
                                    
                                <div class="form-group">
                                    {{ Form::label('categoria') }}
                                    {{ Form::text('categoria', $categoriaproducto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
                                   
                                </div>
                               <input type="hidden" name="idcategoria" value="{{$categoriaproducto->idcategoria}}">
                               
                               @if(is_null( session('iduseradmintienda')  ))
                             
                                  

                               <div class="form-group">
                                        {{ Form::label('tienda') }}
                                      <select class="form-control" name="idtienda">
                                        <option value="">selecione </option>
                                        @foreach ($tienda as $tienda)
                                        @if($categoriaproducto->idtiendacategoriap==$tienda->idtiendas)
                                        <option value="{{$tienda->idtiendas}}"selected>{{$tienda->nombre}} </option>
                                        @endif
                                        @if($categoriaproducto->idtiendacategoriap!=$tienda->idtiendas)
                                        <option value="{{$tienda->idtiendas}}">{{$tienda->nombre}} </option>
                                        @endif
                                        
                                        @endforeach
                                      </select> 
    @else
        <input type="hidden" name="idtienda" value="{{session('iduseradmintienda')}}"> 
        @endif
                                      <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                    </div>
                        
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
