<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idcategoria') }}
            {{ Form::text('idcategoria', $categoriaproducto->idcategoria, ['class' => 'form-control' . ($errors->has('idcategoria') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoria']) }}
            {!! $errors->first('idcategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::text('categoria', $categoriaproducto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idtiendacategoriap') }}
            {{ Form::text('idtiendacategoriap', $categoriaproducto->idtiendacategoriap, ['class' => 'form-control' . ($errors->has('idtiendacategoriap') ? ' is-invalid' : ''), 'placeholder' => 'Idtiendacategoriap']) }}
            {!! $errors->first('idtiendacategoriap', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>