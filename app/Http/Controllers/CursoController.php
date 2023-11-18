<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\Models\Curso;


class CursoController extends Controller
{
  
    public function index(){
        return view('index');
    }
    public function mostrarFormCurso(){
        return view('cad_curso');
    }
    
    public function mostrarManipulaCurso(){
        $registrosCurso = Curso::All();
        return view('manipula_curso',['registrosCurso' => $registrosCurso]);
    }
    public function DeletarCurso(Curso $registrosCurso){
        $registrosCurso->delete();
        return Redirect::route('manipula_curso');
    }

    public function cadastroCurso(Request $request){
        $registrosCur = $request->validate([
        'idcategoria' => 'required',
        'nomecurso' => 'string|required',
        'cargahoraria'=> 'string|required',
        'valor'=> 'string|required',
        ]);

        Curso::create($registrosCur);

        return Redirect::route('index');
    }


    public function AlterarBancoCurso(Curso $registrosCurso, Request $request){
        $registrosCur = $request->validate([
            'idcategoria' => 'required',
            'nomecurso' => 'string|required',
            'cargahoraria'=> 'string|required',
            'valor'=> 'string|required',
            ]);
           
    
            //Esta linha é que altera o registro do banco 
            $registrosCurso->fill($registrosCur);
            $registrosCurso->save();
    
        //alert("Dados alterados com sucesso");
        return Redirect::route('index');
    }
    
    
    
    
    public function MostrarAlterarCurso(Curso $registrosCurso){
     
    
         return view('altera_curso',['registrosCurso' => $registrosCurso]);
    
     }


//buscar
public function BuscarCursoNome(Request $request){

    $registrosCurso= Curso::query();
 
    $registrosCurso->when($request->categoria,function($query,$valor)
    {
        $query->where('nomecurso','like','%'.$valor.'%');
        $query->where('idcategoria','like','%'.$valor.'%');
        $query->where('cargahoraria','like','%'.$valor.'%');
        $query->where('valor','like','%'.$valor.'%');
    });

    $registrosCurso = $registrosCurso->get();
    return view('buscar-curso-nome',['registrosCurso' => $registrosCurso]);

}
}
