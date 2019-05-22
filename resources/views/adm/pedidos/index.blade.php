@extends('adm.layouts.frame')

@section('titulo', 'Historico de pedidos')

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
			<div class="col s12">
                <table class="highlight bordered">
                    <thead>
                        <th>
                            NUMERO
                        </th>
                        <th>
                            FECHA
                        </th>
                        <th>
                            SUBTOTAL
                        </th>
                        <th>
                            DESCUENTO
                        </th>
                        <th>
                            TOTAL
                        </th>
                        <th>
                            ACCIÓN
                        </th>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>
                                {!!$pedido->id!!}
                            </td>
                            <td>
                                {!!$pedido->fecha!!}
                            </td>
                            <td>
                                {!!$pedido->subtotal!!}
                            </td>
                            <td>
                                {!!$pedido->descuento!!}
                            </td>
                            <td>
                                {!!$pedido->total!!}
                            </td>
                            <td>
                                <a href="{{ route('pedidos.show', $pedido->id)}}">
                                    Ver detalle
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>				
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection