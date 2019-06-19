@extends('pages.templates.body')

@section('title', 'Registro de usuario')
@section('css')
<link href="{{ asset('css/pages/distribuidor.css') }}" rel="stylesheet"/>
@endsection

@section('contenido')

<main class="registro mt50">

	<div class="container">


		@if(session('error'))

		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">

			{{ session('error') }}

		</div>


		@endif

		@if(session('success'))

		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">

			{{ session('success') }}

		</div>

		@endif 



		<div class="row">
				@if(count($errors) > 0)
				<div class="col s12 card-panel text-darken-4" style="background-color:#8D302F; color: white" role "alert">
					<h5>Por favor corrige los siguientes errores:</h5>
						<ul>
							@foreach($errors-> all() as $error)
								<li>{{ $error }}</li>
							@endforeach	
						</ul>	
					</div>
				@endif

			<div class="col l4 s12">

				{!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST', 'class' => 'col s12'])!!}

					<h4 class="datos">Ya soy usuario</h4>

	                    <div class="row">

	                        <div class="usuario_input input-field col s12">

	                            {{-- {!!Form::text('username',null,['class'=>''])!!}

	                            {!!Form::label('Username')!!}
 --}}
								<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
								@if ($errors->has('username'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
								@endif
	                        </div>

	                    </div>

	                    <div class="row">

	                        <div class="contrasena_input input-field col s12">

	                            {!!Form::password('password',['class'=>''])!!}

	                            {!!Form::label('Contraseña')!!}

	                        </div>

	                    </div>

	                    <button class="btn waves-effect waves-light right" style="background:#8D302F;" name="action" type="submit">
                        Entrar
                        <i class="material-icons right">
                            send
                        </i>
                    </button>

	                {!!Form::close()!!}

			</div>

			<div class="col l8">

				{!! Form::open(['route'=>'registro.store', 'method'=>'POST', 'files' => true]) !!}

							<h3 class="registrate">Regístrate</h3>

							<p class="desc">Complete el siguiente formulario para registrarte en nuestro sitio web.</p>

							<h4 class="datos">Datos del contacto</h4>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Nombre *') !!}

									{!! Form::text('name', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Apellido *') !!}

									{!! Form::text('apellido', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Username') !!}

									{!! Form::text('username', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>


							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Correo electrónico *') !!}

									{!! Form::email('email', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Contraseña *') !!}

									{!! Form::password('password', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Razón social *') !!}

									{!! Form::text('social', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('CUIT *') !!}

									{!! Form::text('cuit', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Teléfono *') !!}

									{!! Form::text('telefono', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>
							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Dirección') !!}

									{!! Form::text('direccion', null, ['class'=>'']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Código postal') !!}

									{!! Form::text('postal', null, ['class'=>'']) !!}

							    </div>

							</div>
							<div class="row">

						      	<div class="input-field col s12">
                                      {!! Form::select('nivel', ['ortopedia' => 'Ortopedia', 'particular' => 'Particular', 'obra_social' => 'Obra social'], null, ['class' => 'form-control', 'placeholder' => 'Indique tipo de usuario']) !!}
							    </div>

							</div>
							<button class="btn waves-effect waves-light right"  style="background:#8D302F;" name="action" type="submit">
                        REGÍSTRATE
                        <i class="material-icons right">
                            send
                        </i>
                    </button>


						{!! Form::close() !!} 

			</div>

		</div>

	</div>

</main>




</body>

</html>

@endsection
@section('js')
<script type="text/javascript">
	
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection