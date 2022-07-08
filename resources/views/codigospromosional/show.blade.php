@extends('layouts.app')

@section('template_title')
    {{ $codigospromosional->name ?? 'Show Codigospromosional' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Codigospromosional</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('codigospromosionals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcodigospromosional:</strong>
                            {{ $codigospromosional->idcodigospromosional }}
                        </div>
                        <div class="form-group">
                            <strong>Imagenprocional:</strong>
                            {{ $codigospromosional->imagenprocional }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $codigospromosional->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Valordescuento:</strong>
                            {{ $codigospromosional->valordescuento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
