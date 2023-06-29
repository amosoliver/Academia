@extends('layout.default')

<h1>{{ $title }}</h1>

<li><a href="{{ route('diahora.index') }}">{{ $title }}</a></li>

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">{{ isset($editdiahora) ? 'Editar' : 'Adicionar' }} diahora de cumprimento do servidor</h1>
            @isset($editdiahora)
                <div class="box-tools">
                    <a href="{{ route('diahora.index') }}" class="btn btn-box-tool">VOLTAR</a>
                </div>
            @endisset
        </div>
        @isset($editdiahora)
            {{ Form::model($editdiahora, ['method' => 'PATCH', 'route' => ['diahora.update', $editdiahora->id_dia_hora]]) }}
        @else
            {{ Form::open(['method' => 'POST', 'route' => 'diahora.store']) }}
        @endisset
        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    {{ Form::label('id_dia', 'Dia', ['class' => 'control-label col-md-3 col-lg-2']) }}
                    {{ Form::select('id_dia', ['' => 'Selecione um dia'] + $dias, null, ['class' => 'form-select']) }}
                    {!! $errors->first('id_dia') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('id_hora', 'Horario', ['class' => 'control-label col-md-3 col-lg-2']) }}
                    {{ Form::select('id_hora', ['' => 'Selecione um horario'] + $horarios, null, ['class' => 'form-select']) }}
                    {!! $errors->first('id_hora') !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" title="Adicionar diahora">
                {{ isset($editdiahora) ? 'SALVAR ALTERAÇÕES' : 'ADICIONAR' }}
            </button>
        </div>
        {{ Form::close() }}
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table datatable table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($diaHoras as $diahora)
                        <tr>
                            <td>{{ $diahora->dia->ds_dia }}</td>
                            <td>{{ $diahora->hora->hora_inicio}}</td>
                            <td>{{ $diahora->hora->hora_fim}}</td>

                            <td>
                                <a href="?edit={{ $diahora->id_dia_hora }}" title="Editar diahora"
                                    class="btn btn-xs btn-primary">EDITAR</a>
                            </td>
                            <td>
                                @if ($diahora)
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['diahora.destroy', $diahora->id_dia_hora], 'style' => 'display:inline']) }}
                                        <button type="submit" title="Excluir diahora" class="btn btn-danger btn-confirm btn-xs">EXCLUIR</button>
                                    {{ Form::close() }}
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Não há dados para exibir.</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
