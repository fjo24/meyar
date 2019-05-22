@extends('pages.templates.body')
@section('title', 'Contacto')
@section('css')
<link href="{{ asset('css/pages/contacto.css') }}" rel="stylesheet">
    @endsection
@section('contenido')
    <!-- body -->
    <main>
        <iframe allowfullscreen="" frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.8081743798675!2d-58.563315985396336!3d-34.533087680477855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcba0c13332261%3A0x677e831f3825814!2sItalia+6344%2C+Jos%C3%A9+Le%C3%B3n+Su%C3%A1rez%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1557712615585!5m2!1ses-419!2sar" style="border:0" width="100%">
        </iframe>
        <section class="contacto">
            <div class="container">
                <div class="row">
                    <div class="col l12 m12 s12 center" style="color: black">
                    </div>
                    <div class="col l4 m4 s12" style="color: black">
                        <div class="datos_footer col l12 m12 s12">
                                <ul>
                                        <li>
                                            <div class="col s1">
                                                <div class="" style="">
                                                    <img alt="" class="" src="{{asset('img/layouts/ubicacion.png')}}">
                                                    </img>
                                                </div>
                                            </div>
                                            <div class="col s10">
                                                <div class="" style="">
                                                    {{$direccion}}
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col s1 rightlist">
                                                <img alt="" class="" src="{{asset('img/layouts/telefono.png')}}">
                                                </img>
                                            </div>
                                            <div class="rightlist col s10" style="line-height: 29px!important">
                                                {{$telefono}}
                                                <br> 
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col s1 rightlist">
                                                <div class="" style="">
                                                    <img alt="" class="" src="{{asset('img/layouts/email.png')}}">
                                                    </img>
                                                </div>
                                            </div>
                                            <div class="col s10 rightlist">
                                                <div class="" style="line-height: 29px!important;">
                                                    {{$email}}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                        </div>
                    </div>
                    <div class="col m8 s12 l8">
                        {!!Form::open(['route'=>'enviarmailcontacto', 'method'=>'POST'])!!}
						{{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col m6 s12" style="color: #595959">
                                {!!Form::text('nombre',null,['class'=>'', 'placeholder'=>'Nombre'])!!}
                                <label for="nombre">
                                </label>
                            </div>
                            <div class="input-field col m6 s12" style="color: #595959">
                                {!!Form::text('apellido',null,['class'=>'', 'placeholder'=>'Apellido'])!!}
                                <label for="apellido">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6 s12" style="color: #06007E">
                                {!!Form::email('email',null,['class'=>'', 'placeholder'=>'Email'])!!}
                                <label for="email">
                                </label>
                            </div>
                            <div class="input-field col m6 s12" style="color: black">
                                {!!Form::text('telefono',null,['class'=>'', 'placeholder'=>'Telefono'])!!}
                                <label for="telefono">
                                </label>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="input-field col m6 s12" style="color: black">
                                <label for="mensaje">
                                </label>
                                {!!Form::textarea('mensaje', null, ['class'=>'materialize-textarea', 'placeholder'=>'Mensaje'])!!}
                            </div>
                            <div class="col s6">
                                <div class="g-recaptcha" data-sitekey="6LfT-GQUAAAAALDE4kKAhJAYX2I10Ve1PwtaXBQV" required="">
                                </div>
                                <br>
                                <button class="btn btn-default pull-right anima2 boton-siguiente" id="botonSiguienteEstado"  style="color:white; padding: 20px; background-color: #8D302F; border: none; width: 181px;border-radius: 6px; height: 42px!important;" type="button">
                                        <span style="font-family: 'Montserrat';font-size: 13px;position: relative;bottom: 15px;font-weight: 400;">Enviar</span>
                                </button>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </section>
        @endsection

@section('js')
        <script src="https://www.google.com/recaptcha/api.js?hl=es">
        </script>
        <script type="text/javascript">
            $('.logo').click(() => {
            window.location.href = "";
        });
        </script>
        @endsection
    </main>
</link>