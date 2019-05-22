@extends('pages.templates.body')
@section('title', 'Presupuesto')
@section('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/pages/estilos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/add/empresa.css') }}" rel="stylesheet">
            @endsection
@section('contenido')
            <div class="container">
                <div class="flex-containter">
                        <div align="center">
                            @if(isset($mensaje))
                                <div class="alert alert-success text-center" role="alert" style="margin-bottom: 0;height: 56px;font-size: 20px;margin-top: 3%;">
                                    {!! $mensaje !!}
                                </div>
                            @endif
                        </div>
                    <div class="row" style="height: 540px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-cont presupuesto center" style="float: initial; margin-top: 50px;">
                            <form action="{{route('enviarpresupuesto')}}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                <div id="estado1">
                                    <div class="cont-pasos table hide-on-med-and-down" style="padding-right: 103px;">
                                        <img src="{{asset('img/solicitud-datos.fw.png')}}" style="width: 75%;align-items: center;">
                                            <div class="paso datos active col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1" id="elDiv1">
                                                <span>
                                                </span>
                                                <p class="fuenteRC hide-on-med-and-down" style="position: absolute; color: #8D302F; width: 100px;left: 480%; margin-top: 129%;">
                                                    TU OBRA
                                                </p>
                                            </div>
                                            <div class="paso obra col-xs-12 col-sm-4 col-md-4 col-lg-4 hide-on-med-and-down" id="elDiv2">
                                                <span>
                                                </span>
                                                <p class="fuenteRC" style="width: 100px;color: #8D302F; position: absolute; left: 78%; font-weight: bold; top: 9px;">
                                                    TUS DATOS
                                                </p>
                                            </div>
                                        </img>
                                    </div>
                                    <br>
                                        <br>
                                            <br>
                                                <br>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pasos paso-1">
                                                        <p>
                                                            <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="" title="" type="text" value="">
                                                            </input>
                                                        </p>
                                                        <p>
                                                            <input class="form-control" id="mail" name="mail" placeholder="E-mail" required="" title="" type="text" value="">
                                                            </input>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pasos paso-1">
                                                        <p>
                                                            <input class="form-control" id="est" name="localidad" placeholder="Localidad" title="" type="text" value="">
                                                            </input>
                                                        </p>
                                                        <p>
                                                            <input class="form-control" id="tel" name="tel" placeholder="Teléfono" title="" type="text" value="">
                                                            </input>
                                                        </p>
                                                    </div>
                                                    <br>
                                                        <br>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                                                                <!-- <a href="presupuesto.php">Paso anterior</a> -->
                                                                <button class="btn btn-default pull-right anima2 boton-siguiente" id="botonSiguienteEstado"  style="color:white; padding: 20px; background-color: #8D302F; border: none; width: 181px;border-radius: 6px; height: 42px!important;" type="button">
                                                                        <span style="font-family: 'Montserrat';font-size: 13px;position: relative;bottom: 15px;font-weight: 400;">Siguiente</span>
                                                                </button>
                                                            </div>
                                                        </br>
                                                    </br>
                                                </br>
                                            </br>
                                        </br>
                                    </br>
                                </div>
                                <div id="estado2" style="display: none;">
                                    <div class="cont-pasos table hide-on-med-and-down">
                                        <div class="paso datos active col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1" id="elDiv1">
                                            <span>
                                            </span>
                                            <p class="fuenteRC" style="position: absolute; right:-19px; color: #8D302F; font-weight: lighter; width: 100px; margin-top: 116%;">
                                                TUS DATOS
                                            </p>
                                        </div>
                                        <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 re-padding">
                                        </div>
                                        <img src="{{asset('img/solicitud-obras.fw.png')}}" style="align-items: center; width: 70%;">
                                            <div class="paso obra col-xs-12 col-sm-4 col-md-4 col-lg-4" id="elDiv2">
                                                <span>
                                                </span>
                                                <p class="fuenteRC" style="position: absolute; width: 100%;left: 184%;top:8px;color: #8D302F; font-weight: bold;">
                                                    TU OBRA
                                                </p>
                                            </div>
                                        </img>
                                    </div>
                                    <br>
                                        <br>
                                            <br>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pasos paso-2">
                                                    <p>
                                                        <textarea class="form-control" id="detalle" name="detalle" placeholder="Detalles" rows="6" style="height: 120px;">
                                                        </textarea>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pasos paso-2" style="margin-bottom: 40px">
                                                    <p>
                                                        <input class="form-control" id="medida" name="medida" placeholder="Plano (opcional)" title="" type="text" value="">
                                                        </input>
                                                    </p>
                                                    <div class="examinar">
                                                        <div class="input-group">
                                                            <!--      <input type="text" name="plano" id="plano" placeholder="Plano (opcional)"  class="col-xs-10 form-control plano-margen" style="">-->
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn" style="background-color: #8D302F;">
                                                                    <span>
                                                                        Archivo
                                                                    </span>
                                                                    {!! Form::file('archivo') !!}
                                                                </div>
                                                                <div class="file-path-wrapper" style="color: black">
                                                                    {!! Form::text('archivo',null, ['class'=>'file-path']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                                                    <button class="btn btn-default pull-right anima2 boton-enviar fuenteRC" style="background-color: #8D302F;width: 181px;" type="submit">
                                                        Enviar
                                                    </button>
                                                    <button class="btn btn-default pull-right anima2 boton-atras fuenteRC" id="botonEstadoAnterior" style="background-color: white!important; border:2px solid #8D302F;color: #8D302F; margin: 0px 5px;width: 181px;" type="button">
                                                        Anterior
                                                    </button>
                                                </div>
                                            </br>
                                        </br>
                                    </br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
@section('js')
            <script>
                document.getElementById("botonSiguienteEstado").addEventListener("click", mostrarEstado2);
    document.getElementById("botonEstadoAnterior").addEventListener("click", mostrarEstado1);

    function mostrarEstado2() {
        document.getElementById("estado1").className = "animated bounceOutLeft";
        setTimeout(function(){ 
            document.getElementById("estado1").style.display = "none"; 
            document.getElementById("estado2").style.display = "block";
            document.getElementById("estado2").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1";
            document.getElementById("elDiv2").className = "paso obra active col-xs-12 col-sm-4 col-md-4 col-lg-4";
        }, 1000);

    }
    
    function mostrarEstado1() {
        document.getElementById("estado2").className = "animated bounceOutLeft";
        
        setTimeout(function(){ 
            document.getElementById("estado2").style.display = "none"; 
            document.getElementById("estado1").style.display = "block";
            document.getElementById("estado1").className = "animated bounceInRight";
            
            document.getElementById("elDiv1").className = "paso datos active col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1";
            document.getElementById("elDiv2").className = "paso obra col-xs-12 col-sm-4 col-md-4 col-lg-4";
        }, 1000);
    }
    
    function animacion(id, clase) {
        $(id).removeClass("animated "+clase).addClass(clase + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass("animated "+clase);
        });
    };
    document.getElementById('archivo').onchange = function () {
      console.log(this.value);
      document.getElementById('plano').innerHTML = document.getElementById('archivo').files[0].name;
    }
            </script>
            <script>
                $('.slider').slider({
        indicators: true,
        height: 334,
        width: 1330
    });
            </script>
            @endsection
        </link>
    </link>
</link>