<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class HorarioController extends Controller
{
    public function __construct(
        private Horario $horario,
    ) {
    }

    public function index()
    {
        $v['title'] = 'horario de cumprimento do servidor';

        $horarios = $this->horario;
        $v['horarios'] = $horarios->get();
        if (request()->filled('edit')) {
            $v['edithorario'] = $this->horario->find(request('edit'));
        }

        return response()->view('horario.index', $v);
    }

    public function store(Request $req)
    {
        $horario = $this->horario->newInstance();
        $horario->hora_inicio = $req->input('hora_inicio');
        $horario->hora_fim = $req->input('hora_fim');

        try {
            if ($horario->save()) {
                return redirect()->route('horario.index')->with('success', 'horario registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o horario: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o horario.');
    }

    public function update(Request $req, $id)
    {
        $horario = $this->horario->find($id);
        $horario->hora_fim = $req->input('hora_inicio');
        $horario->hora_fim = $req->input('hora_fim');

        try {
            if ($horario->save()) {
                return redirect()->route('horario.index')->with('success', 'horario editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o horario: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o horario.');
    }


    public function destroy($id)
    {
        $horario = $this->horario->find($id);

        try {
            if ($horario->delete()) {
                return redirect()->route('horario.index')->with('success', 'horario excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o horario: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o horario.');
    }
}
