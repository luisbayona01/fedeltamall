@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1> update Administradores tiendas</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Admninistradorestienda</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updateAdministradorestienda') }}"  role="form" enctype="multipart/form-data">
                         
                            @csrf
                   <input type="hidden" name="idadmninistradorestienda"value="{{$admninistradorestienda->idadmninistradorestienda}}">
                            @include('admninistradorestienda.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
