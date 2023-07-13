@extends('layout.default')
@section('main')
    <div class="container border mt-5 ">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{ $title }}</h1>
                </div>
                <br>
                <h2>{{ dump($aluno) }}</h2>
            </div>
        </div>
        {{ Form::open([
            'class' => 'form-horizontal',
            'method' => 'POST',
            'route' => 'agenda.storeMany',
            'enctype' => 'multipart/form-data',
        ]) }}

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('data', 'Data', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('data', null, ['class' => 'form-control data']) }}
            </div>
            <div class="form-group">
                {{ Form::label('id_dia_hora', 'Dia e Hora', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::select('id_dia_hora', ['' => 'Selecione um dia e hora'] + $diahoras, null, ['class' => 'form-select']) }}
                {!! $errors->first('id_dia_hora') !!}
            </div>
            <div class="form-group">
                {{ Form::label('id_status', 'Status', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::select('id_status', ['' => 'Selecione um status'] + $status, null, ['class' => 'form-select']) }}
                {!! $errors->first('id_status') !!}
            </div>


        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">ADICIONAR</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection
