@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
Update Categoriatienda
@stop
    


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Categoriatienda</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('updateCategoriatienda' ) }}"  role="form" enctype="multipart/form-data">
                          
                            @csrf
                            <input type="hidden" name="categoriatiendaid" value="{{$categoriatienda->idcategoriatienda}}">    
                            @include('categoriatienda.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
