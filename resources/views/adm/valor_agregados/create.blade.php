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
        {!!Form::open(['route'=>'valor_agregados.store', 'method'=>'POST', 'files' => true])!!}
        <div class="input-field col l6 s12">
            {!!Form::label('Descripción:')!!}
                    {!!Form::text('descripcion', null , ['class'=>'', ''])!!}
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
        <div class="col l12 s12 no-padding">
            <button class="boton btn-large right" name="action" type="submit">
                Crear
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
@endsection
