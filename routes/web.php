<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

//Router Application
Route::get('/','HomeController@index')->name('home');
Route::get('/todososcursos/{id}','HomeController@todosCursos')->name('home.todoscursos');

//Router para teste
Route::get('/teste','TesteController@index')->name('teste');
Route::post('/salvar','TesteController@setPropagandaCursos')->name('salvar');
Route::post('/slide','TesteController@setDadosSlider')->name('cadSlider');
Route::get('/empresa/sobre','HomeController@sobre')->name('home.sobre');
Route::get('/empresa/contato','HomeController@contato')->name('home.contato');
Route::post('/empresa/contato/enviarmsg','EmailController@enviarEmailUser')->name('home.contato.enviar');
Route::get('/empresa/contato/email_success','EmailController@emailSuccess')->name('home.contato.emailsuccess');
Route::get('/empresa/contato/email_error','EmailController@emailFalha')->name('home.contato.email_error');






/*rotas referente a aluno
Route::get('/aluno','AlunoController@index')->name('aluno.index');

*rotas referente a empresa
Route::get('/empresa','EmpresaController@index')->name('empresa.index');


Auth::routes();

Route::get('/home', 'HomeController@index');*/
