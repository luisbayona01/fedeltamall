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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tienda</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/Tiendastore') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                 
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
                                                        <span class="btn btn btn-info btn-file">Cargar<input type="file" id="file-image" name="file" onchange="Upload()"  required/> </span>
                                                    </span>
                                                </div>
                                          </div>
                                        
                                       
                                    </div>
                                      
                                </div>
                                    <div class="form-group">
                                     <select  class="form-control" name="categoriatienda" required> 
                                      <option value="">Seleccione una categoria </option>
                                      @foreach ( $categoriasTienda as $categoriasTienda)
                                      <option value="{{$categoriasTienda->idcategoriatienda}}">{{$categoriasTienda->nombre}} </option>
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
<script> 
    let allowedImages = ['jpeg', 'jpg', 'png'];

   function  Upload(){
       fileValidation('#file-image', allowedImages);

   }
   



function fileValidation(selector, extensions){
  
        let filePath = document.querySelector(selector).value || '';
        // Seperar nombre de archivo por . y obtener último elemento (extensión)
        let extension = filePath.split('.').pop().toLowerCase();

        // Verificar que la extensión es permitida
        if(!extensions.includes(extension)) {
            alert('Porfavor suba archivos con una extensión vlálida:' + extensions.join(', '));
            // No puedes manipular el valor del input, solo devolver falso
            return false;
        } 
        else 
        {
        //var fileInput = document.getElementById(selector);
        label =  document.querySelector(selector).value.replace(/\\/g, '/').replace(/.*\//, '');
        //console.log(label);
            document.getElementById("namearchivo").value=label;
            //console.log(label);
                }
   
}
   
   
   </script>

