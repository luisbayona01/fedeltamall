<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idtiendas') }}
            {{ Form::text('idtiendas', $tienda->idtiendas, ['class' => 'form-control' . ($errors->has('idtiendas') ? ' is-invalid' : ''), 'placeholder' => 'Idtiendas']) }}
            {!! $errors->first('idtiendas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tienda->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('logo') }}
            {{ Form::text('logo', $tienda->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tiendacategoria') }}
            {{ Form::text('tiendacategoria', $tienda->tiendacategoria, ['class' => 'form-control' . ($errors->has('tiendacategoria') ? ' is-invalid' : ''), 'placeholder' => 'Tiendacategoria']) }}
            {!! $errors->first('tiendacategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>