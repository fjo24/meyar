@extends('adm.layouts.frame')

@section('titulo', 'Meyar | Sliders')

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
            Nuevo slider
        </a>
    </div>
    <div class="col s12">
        <table class="highlight bordered">
            <thead>
                <td>
                    Texto 1
                </td>
                <td>
                    Texto 2
                </td>
                <td>
                    Link
                </td>
                <td>
                    Orden
                </td>
                <td>
                    Sección
                </td>
                <td>
                    Imagen
                </td>
                <td colspan="2" class="text-right">
                    Acciones
                </td>
            </thead>
            <tbody>
                <tr v-for="slider in sliders">
                    <td>
                        @{{ slider.texto }}
                    </td>
                    <td>
                        @{{ slider.texto2 }}
                    </td>
                    <td>
                        @{{ slider.link }}
                    </td>
                    <td>
                        @{{ slider.orden }}
                    </td>
                    <td>
                        @{{ slider.seccion }}
                    </td>
                    <td>
                        @{{ slider.imagen }}
                    </td>
                    <td width="10px">
                        {{--     <a href="#" id="modalTrigger" v-on:click.prevent="editSlider(slider)" class="">
                            <i class="material-icons" style="color:green">
                                    create
                                </i>
                        </a> --}}
                    </td>
                    <td width="10px">
                           {{--  <a href="#" onClick="return confirm('Realmente deseas eliminar el slider?');" v-on:click.prevent="deleteSlider(slider)"  style="color:red" class="">
                            <i class="material-icons">
                                    cancel
                                </i>
                        </a> --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('adm.sliders.create')
    {{-- @include('adm.sliders.edit') --}}
    <div class="col s5">
        <pre>@{{ $data }}</pre>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/adm/sliders.js')}}"></script>
<script>
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection