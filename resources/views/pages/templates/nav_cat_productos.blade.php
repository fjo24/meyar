<ul class="listado_categorias collapsible" style="    border: none;">
        @foreach($categorias as $cat)  
                                @if($categoria->id==$cat->id)
        <li class="active">
            @else
            <li>
                @endif
                <a href="{{ route('page.cat.productos', $cat->id)}}">
                                                @if($categoria->id==$cat->id)
                    <div class="activo categorias_header collapsible-header" style="height: 47px;font-weight: 600;font-size: 16px;">
                        {{$cat->nombre}}          
                        <i class="flechita material-icons" style="color:black!important; position: absolute;left: 23%;">
                            keyboard_arrow_down
                        </i>
                        @else
                        <div class="categorias_header collapsible-header" style="font-size: 15px;">
                        {{$cat->nombre}}
                        <i class="flechita material-icons" style="position: absolute;left: 23%;">
                            keyboard_arrow_right
                        </i>
                        @endif
                    </div>
                </a>
                <div class="collapsible-body">
                    <ul>
                        {{-- @if($categoria->categoria_id!='') --}}
                            @foreach($categoria->categorias as $subcategoria)
                                <li style="margin: 4px 0;">
                                    <a href="{{ route('page.subcat.productos', $subcategoria->id)}}">
                                        <span class="categorias_header collapsible-header" style="padding: 0;height: 28px;font-weight: 600;">
                                                {{$subcategoria->nombre}}
                                                <i class="flechita material-icons" style="color:black!important; position: absolute;left: 23%;">
                                                    keyboard_arrow_right
                                                </i>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        {{-- @else --}}
                            @foreach($productos as $producto)
                                {{-- @foreach($categoria->productos as $pro) --}}
                                    {{-- @if($pro->id==$producto->id) --}}
                                        <li style="margin: 4px 0;">
                                            <a href="{{ route('productoinfo', $producto->id/* ['id' => $producto->id,'cat' => $categoria->id] */)}}">
                                                <span>
                                                    {{$producto->codigo}}
                                                </span>
                                            </a>
                                        </li>
                                    {{-- @endif --}}
                                {{-- @endforeach --}}
                            @endforeach
                        {{-- @endif --}}
                    </ul>
                </div>
        </li>
        @endforeach
    </ul>