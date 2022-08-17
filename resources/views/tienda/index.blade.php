@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tiendas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tienda') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ url('/createtienda') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                       
                                        
										<th>Idtiendas</th>
										<th>Nombre</th>
										<th>Logo</th>
										<th>Tiendacategoria</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiendas as $tienda)
                                        <tr>
                                            
                                            
											<td>{{ $tienda->idtiendas }}</td>
											<td>{{ $tienda->nombre }}</td>
											<td>  <img src="{{ $tienda->logo }}" alt="{{ $tienda->nombre }}"class="img-thumbnail" width="80"  height="80"></td>
											<td>{{ $tienda->tiendacategorias }}</td>

                                            <td>
                                            
                                                <form method="GET" action="{{url('editTiendas',$tienda->idtiendas)}}">
                                                  <button  type="submit" class="btn btn-secondary">editar</button>
                                                </form> 
                                              </td>
                                              <td>
                                              
                                                  <form method="POST" action="{{url('Tiendasdelete', $tienda->idtiendas )}}">
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
