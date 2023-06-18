@extends('layout.default')
@section('main')
    <div class="container border mt-5 ">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{$title}}</h1>
                </div>
                <br>
            </div>
        </div>
        {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'instrutor.store',
        'enctype' => 'multipart/form-data']) }}

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('nome', null, ['class' => 'form-control']) }}
                {!! $errors->first('ds_artista')!!}
            </div>
        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">ADICIONAR</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection




