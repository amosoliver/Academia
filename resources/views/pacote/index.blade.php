@extends('layout.default')

<h1>{{ $title }}</h1>

<li><a href="{{ route('pacote.index') }}">{{ $title }}</a></li>

@section('main')
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">{{ isset($editpacote) ? 'Editar' : 'Adicionar' }} pacote de cumprimento do servidor</h1>
            @isset($editpacote)
                <div class="box-tools">
                    <a href="{{ route('pacote.index') }}" class="btn btn-box-tool">VOLTAR</a>
                </div>
            @endisset
        </div>
        @isset($editpacote)
            {{ Form::model($editpacote, ['method' => 'PATCH', 'route' => ['pacote.update', $editpacote->id_pacote]]) }}
        @else
            {{ Form::open(['method' => 'POST', 'route' => 'pacote.store']) }}
        @endisset
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('nm_pacote', 'Nome', ['class' => 'control-label col-md-3 col-lg-2']) }}
                        {{ Form::text('nm_pacote', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('ds_pacote', 'Descrição', ['class' => 'control-label col-md-3 col-lg-2']) }}
                        {{ Form::text('ds_pacote', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('qt_aulas', 'Quantidade de Dias', ['class' => 'control-label col-md-3 col-lg-2']) }}
                        {{ Form::text('qt_aulas', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" title="Adicionar pacote">
                {{ isset($editpacote) ? 'SALVAR ALTERAÇÕES' : 'ADICIONAR' }}
            </button>
        </div>
        {{ Form::close() }}
    </div>

    <div class="box">
        <div class="box-body">
            <table class="table datatable table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Pacote</th>
                        <th>Descrição</th>
                        <th>Quantidade de dias</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pacotes as $pacote)
                        <tr>
                            <td>{{ $pacote->nm_pacote }}</td>
                            <td>{{ $pacote->ds_pacote }}</td>
                            <td> {{$pacote->qt_aulas}} </td>
                            <td>
                                <a href="?edit={{ $pacote->id_pacote }}" title="Editar pacote"
                                    class="btn btn-xs btn-primary">EDITAR</a>
                            </td>
                            <td>
                                @if ($pacote)
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['pacote.destroy', $pacote->id_pacote], 'style' => 'display:inline']) }}
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
