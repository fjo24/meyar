@extends('adm.layouts.frame')

@section('titulo', 'Edición de servicios')

@section('contenido')
	    @if(count($errors) > 0)
		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
	  		<ul>
	  			@foreach($errors->all() as $error)
	  				<li>{!!$error!!}</li>
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
			<div class="servicios col s12">
				<table class="highlight bordered">
					<thead>
						<td>Imagen</td>
						<td>Texto</td>
						<td>Link</td>
						<td>Orden</td>
						<td class="text-right">Acciones</td>
					</thead>
					<tbody>
					@foreach($servicios as $servicio)
						<tr>
							<td><img src="{{ asset($servicio->imagen) }}" style=""  alt="seccion" width="100" height="60"/></td>
							<td>{{ $servicio->texto }}</td>
							<td>{{ $servicio->link }}</td>
							<td>{{ $servicio->orden }}</td>
							<td class="text-right">
								<a href="{{ route('servicios.edit', $servicio->id) }}"><i class="material-icons">create</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>				
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection