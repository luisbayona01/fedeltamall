@extends('layouts.app')

@section('template_title')
    {{ $categoriatienda->name ?? 'Show Categoriatienda' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categoriatienda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoriatiendas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcategoriatienda:</strong>
                            {{ $categoriatienda->idcategoriatienda }}
                        </div>
                        <div class="form-group">
                            <strong>Imagencategoria:</strong>
                            {{ $categoriatienda->imagencategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriatienda->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
