<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class PacoteController extends Controller
{
    public function __construct(
        private Pacote $pacote,
    ) {
    }

    public function index()
    {
        $v['title'] = 'Pacote';

        $pacotes = $this->pacote;
        $v['pacotes'] = $pacotes->get();
        if (request()->filled('edit')) {
            $v['editpacote'] = $this->pacote->find(request('edit'));
        }

        return response()->view('pacote.index', $v);
    }

    public function store(Request $req)
    {
        $pacote = $this->pacote->newInstance();

        $pacote->nm_pacote = $req->input('nm_pacote');
        $pacote->ds_pacote = $req->input('ds_pacote');
        $pacote->qt_aulas = $req->input('qt_aulas');


        try {
            if ($pacote->save()) {
                return redirect()->route('pacote.index')->with('success', 'pacote registrado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o pacote: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao registrar o pacote.');
    }

    public function update(Request $req, $id)
    {
        $pacote = $this->pacote->find($id);
        $pacote->nm_pacote = $req->input('nm_pacote');
        $pacote->ds_pacote = $req->input('ds_pacote');
        $pacote->qt_aulas = $req->input('qt_aulas');

        try {
            if ($pacote->save()) {
                return redirect()->route('pacote.index')->with('success', 'pacote editado com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao editar o pacote: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao editar o pacote.');
    }


    public function destroy($id)
    {
        $pacote = $this->pacote->find($id);

        try {
            if ($pacote->delete()) {
                return redirect()->route('pacote.index')->with('success', 'pacote excluido com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o pacote: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o pacote.');
    }
}
