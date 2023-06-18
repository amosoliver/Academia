<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class InstrutorController extends Controller
{
    public function __construct(
        private Instrutor $instrutor,
    ) {
    }

    public function index(Request $request)
    {
        $v['title'] = 'Instrutores';
        $v['instrutor'] = $this->instrutor->all();
        return response()->view('instrutor.index', $v);
    }


    public function show($id_instrutor)
    {
        $id_instrutor = request('id_instrutor');
        $v['instrutor'] = $this->instrutor->find($id_instrutor);
        return response()->view('instrutor.show', $v);
    }

    public function create()
    {
        $v['title'] = 'Cadastrar instrutor';
        return response()->view('instrutor.create', $v);
    }

    public function store(Request $req)
    {
        try {
            $instrutor = $this->instrutor->newInstance();
            $instrutor->nome = $req->input('nome');
            if ($instrutor->save()) {
                return redirect()->route('instrutor.index')->with('success', 'Instrutor registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o instrutor: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o instrutor.');
    }

    public function edit($id_instrutor)
    {
        $v['title'] = 'Editar instrutor';
        $v['instrutor'] = $this->instrutor->find($id_instrutor);
        return response()->view('instrutor.edit', $v);
    }

    public function update(Request $req, $id_instrutor)
    {
        try {
            $instrutor = $this->instrutor->find($id_instrutor);
            $instrutor->nome = $req->input('nome');

            if ($instrutor->save()) {
                return redirect()->route('instrutor.index')->with('success', 'instrutor editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o instrutor: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o instrutor.');
    }

    public function destroy($id_instrutor)
    {
        try {
            $instrutor = $this->instrutor->find($id_instrutor);

            if ($instrutor->delete()) {
                return redirect()->route('instrutor.index')->with('sucess', 'instrutor excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o instrutor: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o instrutor.');
    }
}
