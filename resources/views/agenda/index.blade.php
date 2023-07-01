@extends('layout.default')

@section('main')
<div class="container-fluid border mt-2 pb-5">
<div class="container-fluid mt-2 ml-3 mr-3">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <div>
                <a href="{{ route('agenda.create') }}" class="btn btn-success">Adicionar</a>
            </div>
        </div>
    </div>
</div>


<div class="box">
    <div class="box-body">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agenda as $ag)
                <tr>
                    <td><a href="{{ route('agenda.edit', ['id_agenda' => $ag->id_agenda]) }}">{{ $ag->data}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



    @endsection

