@extends('layout.default')

@section('main')

    <div class="jumbotron bg-dark " style="height: 250px">
        <div class="row">
            <div class="col-md-2 mb-3 mt-3">
                <div style="padding-left: 20px;">
                    <img src="{{ $base64Images[$artista->id_artista] }}" alt="Imagem do artista"
                         class="img-fluid rounded border" style="height: 200px; width: 200px;">
                </div>
            </div>
            <div class="col-md-5">
                <div class="">
                    <h1 class="display-4 text-light mt-5">{{ $artista->ds_artista }}</h1>
                    <div class="text-light mt-2">
                        <p>{{ $artista->historia }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid-center mb-6 mx-3 mt-3 pb-5 border ">
        <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-lg-4 row-cols-xl-6 row-cols-xxl-6 row-cols-sm-2 ">
            @foreach($artista->disco as $disco)
                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="{{ $disco->imagem }}" alt="Imagem do Card" style="height: 200px;">
                        <div class="card-body" style="min-height: 140px">
                            <h5 class="card-title"><a href="{{ route('disco.show', $disco->id_disco) }}">
                                    {{$disco->ds_disco}}</a></h5>
                            <p class="card-text">{{ Str::limit($disco->ano) }}</p>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    @endsection
