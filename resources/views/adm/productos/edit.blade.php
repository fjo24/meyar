@extends('adm.layouts.frame')

@section('titulo', 'Nuevo producto')

@section('contenido')
        @if(count($errors) > 0)
<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col l12 s12">
        {!!Form::model($producto, ['route'=>['productos.update',$producto->id], 'method'=>'PUT', 'files' => true])!!}   
        <div class="input-field col l6 s12">
                {!!Form::label('Codigo:')!!}
                        {!!Form::text('codigo', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Descripción:')!!}
                        {!!Form::text('descripcion', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Precio:')!!}
                        {!!Form::text('precio', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Sistema', 'required', 'placeholder' => 'Seleccione categoria']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('promocion', ['oferta' => 'Oferta', 'oportunidad' => 'Oportunidad', 'ninguna' => 'Ninguna'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione promocion']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Alto:')!!}
                        {!!Form::text('alto', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Peso:')!!}
                        {!!Form::text('peso', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Ancho total:', 'Ancho total:')!!}
                        {!!Form::text('ancho_total', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Largo total:', 'Largo total:')!!}
                        {!!Form::text('largo_total', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn boton">
                    <span>
                        Ficha
                    </span>
                    {!! Form::file('ficha') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('ficha',null, ['class'=>'file-path']) !!}
                </div>
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn boton">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                <div class="file-path-wrapper">
                    {!! Form::text('imagen',null, ['class'=>'file-path']) !!}
                </div>
            </div>
            <label class="col l12 s12" for="contenido">
                Contenido
            </label>
            <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" name="contenido" required="">
                {{ $producto->contenido }}
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
