@extends('layouts.app')

@section('template_title')
    {{ $ordendecompra->name ?? 'Show Ordendecompra' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ordendecompra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ordendecompras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idordendecompra:</strong>
                            {{ $ordendecompra->idordendecompra }}
                        </div>
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $ordendecompra->idproducto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $ordendecompra->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Totalorden:</strong>
                            {{ $ordendecompra->totalorden }}
                        </div>
                        <div class="form-group">
                            <strong>Datetime:</strong>
                            {{ $ordendecompra->datetime }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $ordendecompra->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Idusuario:</strong>
                            {{ $ordendecompra->idusuario }}
                        </div>
                        <div class="form-group">
                            <strong>Idcodigopromo:</strong>
                            {{ $ordendecompra->idcodigopromo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
