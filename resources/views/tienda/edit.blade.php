@extends('adminlte::page')
<style type="text/css">
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type="file"] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>

    


@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Tienda</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Tienda</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/updateTiendas')  }}"  role="form" enctype="multipart/form-data">
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    @csrf
                                 <input type="hidden" name="idtiendas" value="{{$tienda->idtiendas}}">
                                    <div class="form-group">
                                        {{ Form::label('nombre') }}
                                        {{ Form::text('nombre', $tienda->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('logo') }}
                                        
                                        <div class="input-group">
                                          
                                            <div class="col-lg-6 col-sm-6 col-12">
                                                
                                                <div class="input-group">
                                                   
                                                    <input type="text" class="form-control" readonly id="namearchivo" />
                                                    <span class="input-group-btn">
                                                        <span class="btn btn btn-info btn-file">Cargar<input type="file" id="file-image" name="file" onchange="Upload()" /> </span>
                                                    </span>
                                                </div>
                                          </div>
                                          <div class="col-lg-6 col-sm-6 col-12">
                                            
                                            <div class="input-group">
                                            <img src="{{$tienda->logo}}"alt=""/>    
                                                </div>
                                      </div>
                                       
                                    </div>
                                      
                                </div>
                                    <div class="form-group">
                                     <select  class="form-control" name="categoriatienda"> 
                                      <option value="">Seleccione una categoria </option>
                                      @foreach ( $categoriasTienda as $categoriasTienda)
                                      @if ($tienda->tiendacategoria== $categoriasTienda->idcategoriatienda)
                                      <option value="{{$categoriasTienda->idcategoriatienda}}"selected>{{$categoriasTienda->nombre}} </option>
                                      @endif
                                      @if ($tienda->tiendacategoria!= $categoriasTienda->idcategoriatienda)
                                      <option value="{{$categoriasTienda->idcategoriatienda}}">{{$categoriasTienda->nombre}} </option>
                                      @endif
                                      @endforeach
                                     </select>

                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
