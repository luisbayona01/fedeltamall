@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1> productos</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ url('crearproductos') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                      
                                        
										<th>Idproductos</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Precio</th>
										<th>Imagen</th>
										<th>Tienda</th>
										<th>categoria</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            
                                            
											<td>{{ $producto->idproductos }}</td>
											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->descripcion }}</td>
											<td>{{ $producto->precio }}</td>
											<td> <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}"class="img-thumbnail" width="80"  height="80"></td>
											<td>{{ $producto->tiendas }}</td>
											<td>{{ $producto->categoria }}</td>

                                            <td>
                                            
                                              <form method="GET" action="{{url('productosedit', $producto->idproductos )}}">
                                                <button  type="submit" class="btn btn-secondary">editar</button>
                                              </form> 
                                            </td>
                                            <td>
                                            
                                                <form method="POST" action="{{url('productosdelete', $producto->idproductos )}}">
                                                    @csrf
                                                  <button  type="submit" class="btn btn-danger">eliminar</button>
                                                </form> 
                                              </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>     
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
