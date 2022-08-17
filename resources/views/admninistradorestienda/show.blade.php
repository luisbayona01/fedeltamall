@extends('layouts.app')

@section('template_title')
    {{ $admninistradorestienda->name ?? 'Show Admninistradorestienda' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Admninistradorestienda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admninistradorestiendas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idadmninistradorestienda:</strong>
                            {{ $admninistradorestienda->idadmninistradorestienda }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $admninistradorestienda->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correoelectronico:</strong>
                            {{ $admninistradorestienda->correoelectronico }}
                        </div>
                        <div class="form-group">
                            <strong>Idtienda:</strong>
                            {{ $admninistradorestienda->idtienda }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $admninistradorestienda->identificacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
