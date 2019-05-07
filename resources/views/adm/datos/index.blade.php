@extends('adm.layouts.frame')

@section('titulo', 'Datos de la pagina')

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
<div id="crud" class="row">
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <td>
                    Email
                </td>
                <td>
                    Direccion
                </td>
                <td>
                    Telefono
                </td>
                <td class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                @foreach ($datos as $dato)    
                    <tr>
                        <td>
                            {{ $dato->email }}
                        </td>
                        <td>
                            {{ $dato->direccion }}
                        </td>
                        <td>
                            {{ $dato->telefono }}
                        </td>
                        <td width="10px">
                        <a href="{{ route('datos.edit',$dato->id)}}">
                                <i class="material-icons">
                                    create
                                </i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
@endsection