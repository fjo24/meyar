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
        <a href="#create"class="boton waves-effect waves-light btn modal-trigger">
            Nuevo usuario
        </a>
    </div>
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <td>
                    Username
                </td>
                <td>
                    Email
                </td>
                <td>
                    Cuit
                </td>
                <td>
                    Telefono
                </td>
                <td>
                    Nivel
                </td>
                <td>
                    Activo
                </td>
                <td>
                    Razón Social
                </td>
                <td colspan="2" class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                <tr v-for="usuario in Usuarios">
                    <td>
                        @{{ usuario.username }}
                    </td>
                    <td>
                        @{{ usuario.email }}
                    </td>
                    <td>
                        @{{ usuario.cuit }}
                    </td>
                    <td>
                        @{{ usuario.telefono }}
                    </td>
                    <td>
                        @{{ usuario.nivel }}
                    </td>
                    <td>
                        @{{ usuario.activo }}
                    </td>
                    <td>
                        @{{ usuario.social }}
                    </td>
                    <td width="10px">
                            <a href="#" id="modalTrigger" v-on:click.prevent="editUsuario(usuario)" class="">
                            <i class="material-icons" style="color:green">
                                    create
                                </i>
                        </a>
                    </td>
                    <td width="10px">
                            <a href="#" v-on:click.prevent="deleteUsuario(usuario)"  style="color:red" class="">
                            <i class="material-icons">
                                    cancel
                                </i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('adm.usuarios.create')
    @include('adm.usuarios.edit')
{{--     <div class="col s5">
        <pre>@{{ $data }}</pre>
    </div> --}}
</div>

@endsection

@section('js')
<script src="{{ asset('js/adm/usuarios.js')}}"></script>
<script>
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection