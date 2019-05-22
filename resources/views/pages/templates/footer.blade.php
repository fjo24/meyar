<footer class="page-footer">
    <div class="container" style="width: 100%">
        <div class="row" style="display:  flex; margin-bottom: 0;align-items:  center;">
            <div class="col l12 s12 m12">
                <div class="footer-a col l3 s12 m6">
                    <div class="col l12 s12 m12">
                        <div class="row">
                            <div class="logfooter center">
                                <img alt="" src="{{asset('img/logo_footer.png')}}">
                                </img>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 s12 m12">
                        <div class="li-redes-footer">
                            <div class="item-redesf">
                                <a href="{{$facebook->link}}">
                                    <img alt="" class="" src="{{asset('img/facebook_footer.png')}}">
                                    </img>
                                </a>
                            </div>
                            <div class="item-redesf">
                                <a href="{{$youtube->link}}">
                                    <img alt="" class="" src="{{asset('img/youtube_footer.png')}}">
                                    </img>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-b col l3 s12 m6 hide-on-med-and-down" style="">
                    <h5 class="titulo-footer" style="    margin-top: 8%;">
                        SECCIONES
                    </h5>
                    <div class="linksb">
                        <div class="col l12 s12 m12" style="padding: 0;">
                            <ul>
                                <li>
                                    <a class="itemsb" href="{{ url('/') }}">
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{ url('/empresa') }}">
                                        Empresa
                                    </a>
                                </li>
                                <li>
                                <a class="itemsb" href="{{route('page.categorias')}}">
                                        Productos
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{route('ofertas')}}">
                                        Ofertas
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{route('presupuesto')}}">
                                        Solicitar Presupuesto
                                    </a>
                                </li>
                                <li>
                                    <a class="itemsb" href="{{route('contacto')}}">
                                        Contacto
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-b col l3 s12 m6 hide-on-med-and-down" style="">
                    <h5 class="titulo-footer" style="    margin-top: 8%;">
                        PRODUCTOS
                    </h5>
                    <div class="linksb">
                        <div class="col l12 s12 m12" style="padding: 0;">
                            <ul>
                                @foreach ($rubros as $rubro)    
                                    <li>
                                        <a class="itemsb" href="{{ route('page.cat.productos', $rubro->id) }}">
                                            {{$rubro->nombre}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer_c col l3 s12 m6 left hide-on-med-and-down">
                    <h5 class="titulo-footer3" style="margin-top: 8%;margin-bottom: 0%;">
                        INDUSTRIA ORTOPÉDICA MEYAR
                    </h5>
                    <div class="listlinks2 col l12 m12 s12">
                        <ul>
                            <li>
                                <div class="col s1">
                                    <div class="" style="">
                                        <img style="margin-top: 5px;" src="{{asset('img/direccion_f.png')}}">
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
                                    <img style="margin-top: 5px;" class="" src="{{asset('img/telefono_f.png')}}">
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
                                        <img style="margin-top: 5px;" class="" src="{{asset('img/email_f.png')}}">
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
            </div>
        </div>
    </div>
</footer>
