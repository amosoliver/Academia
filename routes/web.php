<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('instrutor', [\App\Http\Controllers\InstrutorController::class, 'index'])
    ->name('instrutor.index');
Route::get('instrutor/{id_instrutor}/edit', [\App\Http\Controllers\InstrutorController::class, 'edit'])
    ->name('instrutor.edit');
Route::get('instrutor/create', [\App\Http\Controllers\InstrutorController::class, 'create'])
    ->name('instrutor.create');
Route::post('instrutor/store', [\App\Http\Controllers\InstrutorController::class, 'store'])
    ->name('instrutor.store');
Route::patch('instrutor/{id_instrutor}/update', [\App\Http\Controllers\InstrutorController::class, 'update'])
    ->name('instrutor.update');
Route::delete('instrutor/{id_instrutor}', [\App\Http\Controllers\InstrutorController::class, 'destroy'])
    ->name('instrutor.destroy');

Route::get('horario', [\App\Http\Controllers\HorarioController::class, 'index'])
    ->name('horario.index');
Route::patch('horario/{id_horario}', [\App\Http\Controllers\HorarioController::class, 'edit'])
    ->name('horario.edit');
Route::patch('horario/{id_horario}', [\App\Http\Controllers\HorarioController::class, 'update'])
    ->name('horario.update');
Route::post('horario', [\App\Http\Controllers\HorarioController::class, 'store'])
    ->name('horario.store');
Route::delete('horario/{id_horario}', [\App\Http\Controllers\HorarioController::class, 'destroy'])
    ->name('horario.destroy');

Route::get('diahora', [\App\Http\Controllers\DiaHoraController::class, 'index'])
    ->name('diahora.index');
Route::patch('diahora/{id_dia_hora}', [\App\Http\Controllers\DiaHoraController::class, 'edit'])
    ->name('diahora.edit');
Route::patch('diahora/{id_dia_hora}', [\App\Http\Controllers\DiaHoraController::class, 'update'])
    ->name('diahora.update');
Route::post('diahora', [\App\Http\Controllers\DiaHoraController::class, 'store'])
    ->name('diahora.store');
Route::delete('diahora/{id_dia_hora}', [\App\Http\Controllers\DiaHoraController::class, 'destroy'])
    ->name('diahora.destroy');


Route::get('pacote', [\App\Http\Controllers\PacoteController::class, 'index'])
->name('pacote.index');
Route::patch('pacote/{id_pacote}', [\App\Http\Controllers\PacoteController::class, 'edit'])
->name('pacote.edit');
Route::patch('pacote/{id_pacote}', [\App\Http\Controllers\PacoteController::class, 'update'])
->name('pacote.update');
Route::post('pacote', [\App\Http\Controllers\PacoteController::class, 'store'])
->name('pacote.store');
Route::delete('pacote/{id_pacote}', [\App\Http\Controllers\PacoteController::class, 'destroy'])
->name('pacote.destroy');




Route::get('aluno', [\App\Http\Controllers\AlunoController::class, 'index'])
    ->name('aluno.index');
Route::get('aluno/{id_aluno}/edit', [\App\Http\Controllers\AlunoController::class, 'edit'])
    ->name('aluno.edit');
Route::get('aluno/create', [\App\Http\Controllers\AlunoController::class, 'create'])
    ->name('aluno.create');
Route::post('aluno/store', [\App\Http\Controllers\AlunoController::class, 'store'])
    ->name('aluno.store');
Route::patch('aluno/{id_aluno}/update', [\App\Http\Controllers\AlunoController::class, 'update'])
    ->name('aluno.update');
Route::delete('aluno/{id_aluno}', [\App\Http\Controllers\AlunoController::class, 'destroy'])
    ->name('aluno.destroy');

