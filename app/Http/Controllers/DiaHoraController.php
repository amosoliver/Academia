<?php

namespace App\Http\Controllers;

use App\Models\DiaHora ;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class DiaHoraController extends Controller
{
    public function __construct(
        private DiaHora $diaHora,
    ) {
    }

    public function index()
    {
        $v['title'] = 'Dia/';

        $diaHoras = $this->diaHora;
        $v['diaHoras'] = $diaHoras->get();
        if (request()->filled('edit')) {
            $v['editdiaHora'] = $this->diaHora->find(request('edit'));
        }

        return response()->view('diahora.index', $v);
    }

    public function store(Request $req)
    {
        $diaHora = $this->diaHora->newInstance();
        $diaHora->id_dia = $req->input('id_dia');
        $diaHora->id_horario = $req->input('id_horario');

        try {
            if ($diaHora->save()) {
                return redirect()->route('diahora.index')->with('success', 'diaHora registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o diaHora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o diaHora.');
    }

    public function update(Request $req, $id)
    {
        $diaHora = $this->diaHora->find($id);
        $diaHora->id_dia = $req->input('id_dia');
        $diaHora->id_horario = $req->input('id_horario');

        try {
            if ($diaHora->save()) {
                return redirect()->route('diahora.index')->with('success', 'diaHora editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o diaHora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o diaHora.');
    }


    public function destroy($id)
    {
        $diaHora = $this->diaHora->find($id);

        try {
            if ($diaHora->delete()) {
                return redirect()->route('diahora.index')->with('success', 'diaHora excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o diaHora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o diaHora.');
    }
}
