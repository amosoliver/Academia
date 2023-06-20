@extends('layouts.default')

<h1>{{ $title }}</h1>

<li><a href="{{ route('horario.index') }}">{{ $title }}</a></li>

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">{{ isset($edithorario) ? 'Editar' : 'Adicionar' }} horario de cumprimento do
                servidor</h1>
            @isset($edithorario)
                <div class="box-tools">
                    <a href="{{ route('horario.index') }}" class="btn btn-box-tool">VOLTAR</a>
                </div>
            @endisset
        </div>
        @isset($edithorario)
            {{ Form::model($edithorario, ['method' => 'PATCH', 'route' => ['horario.update', $edithorario->id_horario]]) }}
        @else
            {{ Form::open(['method' => 'POST', 'route' => 'horario.store']) }}
        @endisset
    </div>

    @endsection
