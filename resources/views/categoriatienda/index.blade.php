@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
Categoriatienda
@stop
 


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoriatienda') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ url('createCategoriatienda') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                      
                                        
										<th>Idcategoriatienda</th>
										
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriatiendas as $categoriatienda)
                                        <tr>
                                           
                                            
											<td>{{ $categoriatienda->idcategoriatienda }}</td>
											
											<td>{{ $categoriatienda->nombre }}</td>

                                            <td>
                                            
                                                <form method="GET" action="{{url('editCategoriatienda', $categoriatienda->idcategoriatienda )}}">
                                                  <button  type="submit" class="btn btn-secondary">editar</button>
                                                </form> 
                                              </td>
                                              <td>
                                              
                                                  <form method="POST" action="{{url('Categoriatiendadelete', $categoriatienda->idcategoriatienda )}}">
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
