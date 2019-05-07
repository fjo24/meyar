@extends('adm.layouts.frame')

@section('titulo', 'Editar contenido de empresa')

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
    <div class="col s12">
        {!!Form::model($contenido_empresas, ['route'=>['contenido_empresas.update',$contenido_empresas->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
                <div class="input-field col l6 s12">
                    {!!Form::label('nombre:')!!}
                            {!!Form::text('nombre', null , ['class'=>''])!!}
                </div>
                <div class="input-field col l6 s12">
                    {!!Form::label('link:', 'link de video:')!!}
                            {!!Form::text('video', null , ['class'=>''])!!}
                </div>
                <div class="file-field input-field col l6 s12">
                    <div class="boton btn">
                        <span>
                            Imagen
                        </span>
                        {!! Form::file('imagen') !!}
                    </div>
                    <div class="file-path-wrapper">
                        {!! Form::text('imagen',null, ['class'=>'file-path ', 'placeholder' => 'Recomendado (552 x 329)']) !!}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col s12">
                <label class="col l12 s12" for="parrafo">
                    Descripción
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="descripcion" required="">
                        {{ $contenido_empresas->descripcion }}
                    </textarea>
                </div>
                <label class="col l12 s12" for="parrafo">
                    Contenido
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="contenido" required="">
                        {{ $contenido_empresas->contenido }}
                    </textarea>
                </div>
                <label class="col l12 s12" for="parrafo">
                    Contenido 2
                </label>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="contenido2" required="">
                        {{ $contenido_empresas->contenido2 }}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Editar
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('select').formSelect();
  });

	CKEDITOR.replace('descripcion');
	CKEDITOR.replace('contenido');
	CKEDITOR.replace('contenido2');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';
</script>
@endsection
