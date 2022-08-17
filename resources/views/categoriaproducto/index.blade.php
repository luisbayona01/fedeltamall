@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1> Categoriaproducto</h1>
@stop
   


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categoriaproducto') }}
                            </span>

                             <div class="float-right">
                               <a href= "{{ url ('categoriaproductocrear')}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                     
                                        
										<th>Idcategoria</th>
										<th>Categoria</th>
										<th>tienda</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriaproductos as $categoriaproducto)
                                        <tr>
                                            
                                            
											<td>{{ $categoriaproducto->idcategoria }}</td>
											<td>{{ $categoriaproducto->categoria }}</td>
											<td>{{ $categoriaproducto->tiendas }}</td>

                                            <td>
                                            
                                                <form method="GET" action="{{url('editcategorias',$categoriaproducto->idcategoria )}}">
                                                  <button  type="submit" class="btn btn-secondary">editar</button>
                                                </form> 
                                              </td>
                                              <td>
                                              
                                                  <form method="POST" action="{{url('categoriasdelete', $categoriaproducto->idcategoria )}}">
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
               {{--{!! $categoriaproductos->links() !!}--}}
            </div>
        </div>
    </div>
@endsection
