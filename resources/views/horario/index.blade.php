@extends('layout.default')

<h1>{{ $title }}</h1>

<li><a href="{{ route('horario.index') }}">{{ $title }}</a></li>

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">{{ isset($edithorario) ? 'Editar' : 'Adicionar' }} horario de cumprimento do servidor</h1>
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
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('hora_inicio', 'hora_inicio', ['class' => 'control-label col-md-3 col-lg-2']) }}
                        {{ Form::text('hora_inicio', null, ['class' => 'form-control horario']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('hora_fim', 'hora_fim', ['class' => 'control-label col-md-3 col-lg-2']) }}
                        {{ Form::text('hora_fim', null, ['class' => 'form-control horario']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" title="Adicionar horario">
                {{ isset($edithorario) ? 'SALVAR ALTERAÇÕES' : 'ADICIONAR' }}
            </button>
        </div>
        {{ Form::close() }}
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table datatable table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Hora Inicio</th>
                        <th>Hora Fim</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($horarios as $horario)
                        <tr>
                            <td>{{ $horario->hora_inicio }}</td>
                            <td>{{ $horario->hora_fim }}</td>
                            <td>
                                <a href="?edit={{ $horario->id_horario }}" title="Editar horario"
                                    class="btn btn-xs btn-primary">EDITAR</a>
                            </td>
                            <td>
                                @if ($horario)
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['horario.destroy', $horario->id_horario], 'style' => 'display:inline']) }}
                                        <button type="submit" title="Excluir percentual" class="btn btn-danger btn-confirm btn-xs">EXCLUIR</button>
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
