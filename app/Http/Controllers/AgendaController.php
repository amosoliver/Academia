<?php

namespace App\Http\Controllers;

use App\Models\DiaHora;
use App\Models\Agenda;
use App\Models\Status;
use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class AgendaController extends Controller
{
    public function __construct(
        private Agenda $agenda,
        private Aluno $aluno,
        private Instrutor $instrutor,
        private Status $status,
        private DiaHora $diahora
    ) {
    }

    public function index(Request $request)
    {
        $v['title'] = 'agendas';
        $v['agenda'] = $this->agenda->all();
        return response()->view('agenda.index', $v);
    }


    public function show($id_agenda)
    {
        $id_agenda = request('id_agenda');
        $v['agenda'] = $this->agenda->find($id_agenda);
        return response()->view('agenda.show', $v);
    }

    public function create()
    {
        $v['title'] = 'Cadastrar agenda';
        $v['alunos'] = $this->aluno->selectList();
        $v['status'] = $this->status->selectList();
        $v['diahoras'] = $this->diahora->selectList();

        return response()->view('agenda.create', $v);
    }
    public function createMany()
    {
        $aluno = request('id_aluno');
        $v['title'] = 'Cadastrar agenda';
        $v['aluno'] = $this->aluno->find(1);
        $v['status'] = $this->status->selectList();
        $v['diahoras'] = $this->diahora->selectList();

        return response()->view('agenda.createMany', $v);
    }

    public function store(Request $req)
    {
        $data = Carbon::createFromFormat('d/m/Y', $req->input('data'))->format('Y-m-d');
        try {
            $agenda = $this->agenda->newInstance();
            $agenda->data = $data;
            $agenda->id_aluno = $req->input('id_aluno');
            $agenda->id_dia_hora = $req->input('id_dia_hora');
            $agenda->id_status = $req->input('id_status');
            if ($agenda->save()) {
                return redirect()->route('agenda.index')->with('success', 'agenda registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o agenda: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o agenda.');
    }

    public function storeMany(Request $req)
    {
        $aluno = request('id_aluno');
        $data = Carbon::createFromFormat('d/m/Y', $req->input('data'))->format('Y-m-d');
        try {
            $agenda = $this->agenda->newInstance();
            $agenda->data = $data;
            $agenda->id_aluno = $aluno;
            $agenda->id_dia_hora = $req->input('id_dia_hora');
            $agenda->id_status = $req->input('id_status');
            if ($agenda->save()) {
                return redirect()->route('agenda.index')->with('success', 'agenda registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o agenda: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o agenda.');
    }

    public function edit($id_agenda)
    {
        $v['title'] = 'Editar agenda';
        $v['agenda'] = $this->agenda->find($id_agenda);
        return response()->view('agenda.edit', $v);
    }

    public function update(Request $req, $id_agenda)
    {
        $data = Carbon::createFromFormat('d/m/Y', $req->input('data'))->format('Y-m-d');

        try {
            $agenda = $this->agenda->find($id_agenda);
            $agenda->data = $data;
            $agenda->id_aluno = $req->input('id_aluno');
            $agenda->id_dia_hora = $req->input('id_dia_hora');
            $agenda->id_status = $req->input('id_status');
            if ($agenda->save()) {
                return redirect()->route('agenda.index')->with('success', 'agenda editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o agenda: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o agenda.');
    }
}
