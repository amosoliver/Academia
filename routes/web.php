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
Route::patch('horario/{id_percentual}', [\App\Http\Controllers\HorarioController::class, 'edit'])
    ->name('horario.edit');
Route::patch('horario/{id_percentual}', [\App\Http\Controllers\HorarioController::class, 'update'])
    ->name('horario.update');
Route::post('horario', [\App\Http\Controllers\HorarioController::class, 'store'])
    ->name('horario.store');
Route::delete('horario/{id_horario}', [\App\Http\Controllers\HorarioController::class, 'destroy'])
    ->name('horario.destroy');

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

