<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\Models\Aula;



class AulaController extends Controller
{
    public function index(){
        return view('index');
    }
    public function mostrarFormAula(){
        return view('cad_aula');
    }
    public function mostrarManipulaAula(){
        $registrosAula = Aula::All();
        return view('manipula_aula',['registrosAula' => $registrosAula]);
    }

    public function DeletarAula(Aula $registrosAula){
        $registrosAula->delete();

        return Redirect::route('manipula-aula');
    }

    public function cadastroAula(Request $request){
        $registrosAul = $request->validate([
        'idcurso' => 'required',
        'tituloaula' => 'string|required',
        'urlaula'=> 'string|required',
        ]);

        Aula::create($registrosAul);

        return Redirect::route('index');
    }


public function AlterarBancoAula(Aula $registrosAula, Request $request){
    $registrosAul = $request->validate([
        'idcurso' => 'required',
        'tituloaula' => 'string|required',
        'urlaula'=> 'string|required',
        ]);
       

        //Esta linha é que altera o registro do banco 
        //$registrosAula->id;
        $registrosAula->save($registrosAul);

    //alert("Dados alterados com sucesso");
    return Redirect::route('index');
}




public function MostrarAlterarAula(Aula $id){
 

     return view('alterar_aula',['registrosAula' => $id]);

 }

}