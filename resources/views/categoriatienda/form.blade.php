<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idcategoriatienda') }}
            {{ Form::text('idcategoriatienda', $categoriatienda->idcategoriatienda, ['class' => 'form-control' . ($errors->has('idcategoriatienda') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoriatienda']) }}
            {!! $errors->first('idcategoriatienda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagencategoria') }}
            {{ Form::text('imagencategoria', $categoriatienda->imagencategoria, ['class' => 'form-control' . ($errors->has('imagencategoria') ? ' is-invalid' : ''), 'placeholder' => 'Imagencategoria']) }}
            {!! $errors->first('imagencategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $categoriatienda->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>