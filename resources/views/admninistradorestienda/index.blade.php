@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Administradores tiendas</h1>
@stop


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Admninistradorestienda') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ url('/createAdministradorestienda') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                       
                                        
										<th>Idadmninistradorestienda</th>
										<th>Nombre</th>
										<th>Correoelectronico</th>
										<th>tienda</th>
										<th>Identificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admninistradorestiendas as $admninistradorestienda)
                                        <tr>
                                           
                                            
											<td>{{ $admninistradorestienda->idadmninistradorestienda }}</td>
											<td>{{ $admninistradorestienda->nombre }}</td>
											<td>{{ $admninistradorestienda->correoelectronico }}</td>
											<td>{{ $admninistradorestienda->tiendas }}</td>
											<td>{{ $admninistradorestienda->identificacion }}</td>

                                            <td>
                                            
                                                <form method="GET" action="{{url('editAdministradorestienda',$admninistradorestienda->idadmninistradorestienda  )}}">
                                                  <button  type="submit" class="btn btn-secondary">editar</button>
                                                </form> 
                                              </td>
                                              <td>
                                              
                                                  <form method="POST" action="{{url('Administradorestiendadelete', $admninistradorestienda->idadmninistradorestienda )}}">
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
