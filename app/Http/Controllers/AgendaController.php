<?php

namespace App\Http\Controllers;
use App\Models\DiaHora;
use App\Models\Agenda;
use App\Models\Status;
use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    public function __construct(
        private Agenda $agenda,
        private Instrutor $aluno,
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
        $v['diahoras'] =$this->diahora->selectList();

        return response()->view('agenda.create', $v);
    }

    public function store(Request $req)
    {

        try {
            $agenda = $this->agenda->newInstance();
            $agenda->nome = $req->input('nome');
            $agenda->cpf = $req->input('cpf');
            $agenda->email = $req->input('email');
            $agenda->dt_nascimento = $req->input('dt_nascimento');
            $agenda->id_instrutor = $req->input('id_instrutor');
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
        try {
            $agenda = $this->agenda->find($id_agenda);
            $agenda->nome = $req->input('nome');

            if ($agenda->save()) {
                return redirect()->route('agenda.index')->with('success', 'agenda editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o agenda: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o agenda.');
    }

    public function destroy($id_agenda)
    {
        try {
            $agenda = $this->agenda->find($id_agenda);

            if ($agenda->delete()) {
                return redirect()->route('agenda.index')->with('sucess', 'agenda excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o agenda: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o agenda.');
    }
}
