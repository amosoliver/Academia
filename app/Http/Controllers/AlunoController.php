<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AlunoController extends Controller
{
    public function __construct(
        private Aluno $aluno,
        private Instrutor $instrutor,
    ) {
    }

    public function index(Request $request)
    {
        $v['title'] = 'Alunos';
        $v['aluno'] = $this->aluno->all();
        return response()->view('aluno.index', $v);
    }


    public function show($id_aluno)
    {
        $id_aluno = request('id_aluno');
        $v['aluno'] = $this->aluno->find($id_aluno);
        return response()->view('aluno.show', $v);
    }

    public function create()
    {
        $v['title'] = 'Cadastrar aluno';
        $v['instrutores'] = $this->instrutor->selectList();
        return response()->view('aluno.create', $v);
    }

    public function store(Request $req)
    {

        try {
            $aluno = $this->aluno->newInstance();
            $aluno->nome = $req->input('nome');
            $aluno->cpf = $req->input('cpf');
            $aluno->email = $req->input('email');
            $aluno->dt_nascimento = $req->input('dt_nascimento');
            $aluno->id_instrutor = $req->input('id_instrutor');
            if ($aluno->save()) {
                return redirect()->route('aluno.index')->with('success', 'Aluno registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o aluno: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o aluno.');
    }

    public function edit($id_aluno)
    {
        $v['title'] = 'Editar aluno';
        $v['aluno'] = $this->aluno->find($id_aluno);
        return response()->view('aluno.edit', $v);
    }

    public function update(Request $req, $id_aluno)
    {
        try {
            $aluno = $this->aluno->find($id_aluno);
            $aluno->nome = $req->input('nome');

            if ($aluno->save()) {
                return redirect()->route('aluno.index')->with('success', 'aluno editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o aluno: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o aluno.');
    }

    public function destroy($id_aluno)
    {
        try {
            $aluno = $this->aluno->find($id_aluno);

            if ($aluno->delete()) {
                return redirect()->route('aluno.index')->with('sucess', 'aluno excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o aluno: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o aluno.');
    }
}
