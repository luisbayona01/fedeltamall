<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idcodigospromosional') }}
            {{ Form::text('idcodigospromosional', $codigospromosional->idcodigospromosional, ['class' => 'form-control' . ($errors->has('idcodigospromosional') ? ' is-invalid' : ''), 'placeholder' => 'Idcodigospromosional']) }}
            {!! $errors->first('idcodigospromosional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagenprocional') }}
            {{ Form::text('imagenprocional', $codigospromosional->imagenprocional, ['class' => 'form-control' . ($errors->has('imagenprocional') ? ' is-invalid' : ''), 'placeholder' => 'Imagenprocional']) }}
            {!! $errors->first('imagenprocional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $codigospromosional->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valordescuento') }}
            {{ Form::text('valordescuento', $codigospromosional->valordescuento, ['class' => 'form-control' . ($errors->has('valordescuento') ? ' is-invalid' : ''), 'placeholder' => 'Valordescuento']) }}
            {!! $errors->first('valordescuento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>