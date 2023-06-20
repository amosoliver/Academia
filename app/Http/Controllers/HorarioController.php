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

    public function index(): Response
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
        $horario->hora_fim = $req->input('hora_inicio');
        $horario->hora_fim = $req->input('hora_fim');

        try {
            if ($horario->save()) {
                flash('horario de cumprimento do servidor adicionado.')->success();

                return redirect()->route('horario.index');
            }
        } catch (\Exception $ex) {
            flashException($ex);
        }

        return redirect()->back()->withInput();
    }

    public function update($id)
    {
        $horario = $this->horario->find($id);
        $horario->hora_fim = $req->input('hora_inicio');
        $horario->hora_fim = $req->input('hora_fim');

        try {
            if ($horario->save()) {
                flash('Alterações salvas.')->success();
            }
        } catch (\Exception $ex) {
            flashException($ex);
            return redirect()->back()->withInput();
        }

        return redirect()->route('horario.index');
    }

    public function destroy($id)
    {
        $horario = $this->horario->find($id);

        try {
            if ($horario->delete()) {
                flash('horario de cumprimento do servidor excluído.')->success();
            }
        } catch (\Exception $ex) {
            flashException($ex);
        }

        return redirect()->route('horario.index');
    }

}
