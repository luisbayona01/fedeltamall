<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idordendecompra') }}
            {{ Form::text('idordendecompra', $ordendecompra->idordendecompra, ['class' => 'form-control' . ($errors->has('idordendecompra') ? ' is-invalid' : ''), 'placeholder' => 'Idordendecompra']) }}
            {!! $errors->first('idordendecompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idproducto') }}
            {{ Form::text('idproducto', $ordendecompra->idproducto, ['class' => 'form-control' . ($errors->has('idproducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('idproducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $ordendecompra->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('totalorden') }}
            {{ Form::text('totalorden', $ordendecompra->totalorden, ['class' => 'form-control' . ($errors->has('totalorden') ? ' is-invalid' : ''), 'placeholder' => 'Totalorden']) }}
            {!! $errors->first('totalorden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('datetime') }}
            {{ Form::text('datetime', $ordendecompra->datetime, ['class' => 'form-control' . ($errors->has('datetime') ? ' is-invalid' : ''), 'placeholder' => 'Datetime']) }}
            {!! $errors->first('datetime', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $ordendecompra->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idusuario') }}
            {{ Form::text('idusuario', $ordendecompra->idusuario, ['class' => 'form-control' . ($errors->has('idusuario') ? ' is-invalid' : ''), 'placeholder' => 'Idusuario']) }}
            {!! $errors->first('idusuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idcodigopromo') }}
            {{ Form::text('idcodigopromo', $ordendecompra->idcodigopromo, ['class' => 'form-control' . ($errors->has('idcodigopromo') ? ' is-invalid' : ''), 'placeholder' => 'Idcodigopromo']) }}
            {!! $errors->first('idcodigopromo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>