@extends('pages.templates.body')
@section('title', 'Categorias')
@section('css')
<link href="{{ asset('css/pages/categorias.css') }}" rel="stylesheet">
@endsection
@section('contenido')
<div class="container" style="width: 92%;">
    <div class="row" style="margin-top: 7%;">
        <div class="col l12 s12 m12">
            @foreach($categorias as $categoria)
            <div class="col l6 s12 m6">
                <div class="center" style="padding-bottom: 10%;">
                    <a href="{{ route('page.cat.productos', $categoria->id)}}">
                        <div class="efecto">
                            <span class="right">
                                    <div class="div-nombre">
                                            {!!$categoria->nombre !!}
                                        </div>
                                        <hr class="hr-efecto">
                            </span>
                        </div>
                        <img alt="" class="responsive-img" src="{{asset($categoria->imagen)}}" style="">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection