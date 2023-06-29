<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class HoraController extends Controller
{
    public function __construct(
        private Hora $hora,
    ) {
    }

    public function index()
    {
        $v['title'] = 'hora de cumprimento do servidor';

        $v['horas'] = $this->hora->get();
        if (request()->filled('edit')) {
            $v['edithora'] = $this->hora->find(request('edit'));
        }

        return response()->view('hora.index', $v);
    }

    public function store(Request $req)
    {
        $hora = $this->hora->newInstance();
        $hora->hora_inicio = $req->input('hora_inicio');
        $hora->hora_fim = $req->input('hora_fim');

        try {
            if ($hora->save()) {
                return redirect()->route('hora.index')->with('success', 'hora registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o hora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o hora.');
    }

    public function update(Request $req, $id)
    {
        $hora = $this->hora->find($id);
        $hora->hora_fim = $req->input('hora_inicio');
        $hora->hora_fim = $req->input('hora_fim');

        try {
            if ($hora->save()) {
                return redirect()->route('hora.index')->with('success', 'hora editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o hora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o hora.');
    }


    public function destroy($id)
    {
        $hora = $this->hora->find($id);

        try {
            if ($hora->delete()) {
                return redirect()->route('hora.index')->with('success', 'hora excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o hora: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o hora.');
    }
}
