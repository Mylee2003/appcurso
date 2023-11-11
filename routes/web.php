<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AulaController;

//para ir para a Index
Route::get('/',[CategoriaController::class,'index'])->name('index');

//para ir para o cadastro do curso
Route::get('/cadcurso',[CursoController::class,'mostrarFormCurso'])->name("form-cadastro-curso");
Route::post('/cadcurso',[CursoController::class,'cadastroCurso'])->name("cadastro-curso");

//rotas para manipular curso
Route::get('/manipulacurso',[CursoController::class,'mostrarManipulaCurso'])->name("manipula-curso");
//rotas para alterar curso
Route::get('alterar-curso/{registrosCurso}',[CursoController::class,'MostrarAlterarCurso'])->name('alterar-curso');
//rotas para deletar curso
Route::delete('/deletar-curso/{registrosCurso}',[CursoController::class,'DeletarCurso'])->name('deletar-curso');


//para ir para o cadastro da categoria 
Route::get('/cadcategoria',[CategoriaController::class,'mostrarFormCat'])->name("form-cadastro-categoria");
Route::post('/cadcategoria',[CategoriaController::class,'cadastroCat'])->name("cadastro-categoria");

//rotas para manipular categoria
Route::get('/manipulacategoria',[CategoriaController::class,'mostrarManipulaCategoria'])->name("manipula-categoria");

//rotas para alterar categoria
Route::get('alterar-categoria/{registrosCategoria}',[CategoriaController::class,'MostrarAlterarCurso'])->name('alterar-categoria');
Route::put('alterarbancocategoria/{registrosCategoria}',[CategoriaController::class,'AlterarBancoCurso'])->name('alterar-banco-categoria');

//rotas para deletar categoria
Route::delete('/deletar-categoria/{registrosCategoria}',[CategoriaController::class,'DeletarCurso'])->name('deletar-categoria');

//rotas para deletar curso
Route::delete('/cursocategoria/{registrosCurso}',[CategoriaController::class,'DeletarCurso'])->name('deletar-curso');

//rotas  para buscar por nome da categoria 
Route::get('/manipulanomecategoria', [CategoriaController::class,'BuscarCategoriaNome'])->name('buscar-categoria-nome');




//para ir para o cadastro da aula 
Route::get('/cadAula',[AulaController::class,'mostrarFormAula'])->name("form-cadastro-aula");
Route::post('/cadAula',[AulaController::class,'cadastroAula'])->name("cadastro-aula");

//rotas para manipular aula
Route::get('/manipulaaula',[AulaController::class,'mostrarManipulaAula'])->name("manipula-aula");
//rotas para alterar aula
Route::get('alterar-aula/{registrosAula}',[AulaController::class,'MostrarAlterarAula'])->name('alterar-aula');
//rotas para deletar aula
Route::delete('/deletar-aula/{registrosAula}',[AulaController::class,'DeletarAula'])->name('deletar-aula');
