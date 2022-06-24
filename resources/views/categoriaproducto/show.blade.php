@extends('layouts.app')

@section('template_title')
    {{ $categoriaproducto->name ?? 'Show Categoriaproducto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categoriaproducto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoriaproductos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcategoria:</strong>
                            {{ $categoriaproducto->idcategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $categoriaproducto->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Idtiendacategoriap:</strong>
                            {{ $categoriaproducto->idtiendacategoriap }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
