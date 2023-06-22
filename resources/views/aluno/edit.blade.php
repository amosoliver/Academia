@extends('layout.default')
@section('main')
    <div class="container border mt-5 ">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{ $title }}</h1>
                </div>
                <br>
            </div>
            <form action="{{ route('aluno.destroy', $aluno->id_aluno) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-submit justify-text-center">EXCLUIR</button>
            </form>
        </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::model($aluno, ['method' => 'PATCH', 'route' => ['aluno.update', request('id_aluno')]]) !!}
                {{ Form::label('nome', 'Nome') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('nome', $aluno->ds_aluno, ['autofocus']) }}
                </div>
            </div>
            <br>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">SALVAR ALTERAÇÕES</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
