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
                    @php
                        $total = 0;
                    @endphp
                        <thead>
                            <th>
                                NOMBRE
                            </th>
                            <th>
                                CANTIDAD
                            </th>
                            <th>
                                PRECIO UNITARIO
                            </th>
                            <th>
                                TOTAL
                            </th>
                        </thead>
                        <tbody>
                            @foreach($pedido->productos as $producto)
                            <tr>
                                <td>
                                    {!!$producto->nombre!!}
                                </td>
                                <td>
                                    {!!$producto->cantidad!!}
                                </td>
                                <td>
                                    {{ '$'.number_format($producto->precio, 2, ',','.') }}
                                </td>
                                <td>
                                    {{ '$'.number_format($producto->precio*->costo, 2, ',','.') }}
                                </td>
                                @php
                                                $total = $total + $producto->pivot->costo;
                                                @endphp
                            </tr>
                            @endforeach
                            <tr style="border-top: 3px solid black;border-bottom: none;height:150%;color: #595959">
                                                <td colspan="3">
                                                <textarea id="mensaje" name="mensaje" class="materialize-textarea" placeholder="Mensaje"></textarea>
                                                </td>
                                                <td class="total fs24 azul bold">Subtotal</td>
                                                <td>{{ '$'.number_format($total, 2, ',','.') }}</td>
                                            </tr>
                                            <tr style="border-bottom: none;">
                                                <td colspan="3"></td>
                                                <td class="total fs24 azul bold">
                                                @if(isset($pedido->descuento->porcentaje))
                                                Descuento({{ $pedido->descuento->porcentaje.'%' }})
                                                @else
                                                Descuento(0%)
                                                @endif
                                                </td>
                                                <td>{{ '$'.number_format($total-$pedido->subtotal, 2, ',','.') }}</td>
                                            </tr>
                                            <tr style="border-bottom: none;">
                                                <td colspan="3"></td>
                                                <td class="total fs24 azul bold">Subtotal (Con descuento)</td>
                                                <td>{{ '$'.number_format($pedido->subtotal, 2, ',','.') }}</td>
                                            </tr>
                                            <tr style="border-bottom: none;">
                                                <td colspan="3"></td>
                                                <td class="total fs24 azul bold">IVA</td>
                                                <td>{{ $iva }}</td>
                                            </tr>
                                            <tr style="border-bottom: none;">
                                                <td colspan="3"></td>
                                                <td class="total fs24 azul bold">Total (IVA incluido)</td>
                                                
                                                <td name>{{ '$'.number_format($pedido->total, 2, ',','.') }}</td>
                                            </tr>
                        </tbody>
                    </table>
			</div>
		</div>
<script type="text/javascript" src="{{ asset('js/eliminar.js') }}"></script>

@endsection