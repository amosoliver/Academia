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
        {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'aluno.store',
        'enctype' => 'multipart/form-data']) }}

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('nome', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('cpf', 'Cpf', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('cpf', null, ['class' => 'form-control cpf']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('dt_nascimento', 'Data de Nascimento', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('dt_nascimento', null, ['class' => 'form-control data']) }}
            </div>
            <div class="form-group">
                {{ Form::label('id_instrutor', 'Instrutor', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::select('id_instrutor', ['' => 'Selecione um instrutor'] + $instrutores, null, ['class' => 'form-select']) }}
                {!! $errors->first('id_instrutor') !!}
            </div>
            <div class="form-group">
                {{ Form::label('id_pacote', 'Pacote', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::select('id_pacote', ['' => 'Selecione um pacote'] + $pacotes, null, ['class' => 'form-select']) }}
                {!! $errors->first('id_pacote') !!}
            </div>

        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">ADICIONAR</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection




