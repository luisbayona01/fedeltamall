<div class="box box-info padding-1">
    <div class="box-body">
    {{session('iduseradmintienda')}}
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $admninistradorestienda->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correoelectronico') }}
            {{ Form::text('correoelectronico', $admninistradorestienda->correoelectronico, ['class' => 'form-control' . ($errors->has('correoelectronico') ? ' is-invalid' : ''), 'placeholder' => 'Correoelectronico']) }}
            {!! $errors->first('correoelectronico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         <?php  
         if( is_null(session('iduseradmintienda'))){
       $tiendas=$admninistradorestienda->idtienda;
       ?> 
        <?php }else{
        $tiendas=session('iduseradmintienda');
     ?>

<input type="hidden" name="idtienda" value="{{session('iduseradmintienda')}}"> 
    <?php
         }
          ?>

        @if(is_null(session('iduseradmintienda')))
        <div class="form-group">
            {{ Form::label('Tienda') }}

            
            <select class="form-control" name="idtienda" required>
                <option value="">selecione </option>
              
                @foreach ($tienda as $tienda)
            
                    
                @if($tienda->idtiendas==$tiendas )
                <option value="{{$tienda->idtiendas}}" selected>{{$tienda->nombre}} </option>
                @endif;

               
               
              @if($tienda->idtiendas!=$tiendas )
                <option value="{{$tienda->idtiendas}}">{{$tienda->nombre}} </option>
                
                 @endif;
                @endforeach
              </select> 
              @endif
       

             

               
               
             
                 
           

        </div>
        <div class="form-group">
            {{ Form::label('identificacion') }}
            {{ Form::text('identificacion', $admninistradorestienda->identificacion, ['class' => 'form-control' . ($errors->has('identificacion') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
            {!! $errors->first('identificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>