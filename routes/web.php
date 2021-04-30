<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['uses'=>'Controller@index'])->name('home');

// sociétés
Route::get('/liste_societe_table', ['as' => 'societes.tous.societe','uses'=>'Societes\SocieteController@listeSocieteAjax']);
Route::get('/add_societe', ['as' => 'societes.add_societe','uses'=>'Societes\SocieteController@addSociete']);
Route::get('/edit_societe', ['as' => 'societes.edit_societe','uses'=>'Societes\SocieteController@editSociete']);
Route::get('/edit_societe_ajax', ['as' => 'societes.edit_societe_ajax','uses'=>'Societes\SocieteController@editSocieteAjax']);
Route::get('/delete_societe', ['as' => 'societes.delete_societe','uses'=>'Societes\SocieteController@deleteSociete']);

// participants
Route::get('/liste_participant_table', ['as' => 'participants.tous.participant','uses'=>'Participants\ParticipantController@listeParticipantAjax']);
Route::get('/add_participant', ['as' => 'participants.add_participant','uses'=>'Participants\ParticipantController@addParticipant']);
Route::get('/edit_participant', ['as' => 'participants.edit_participant','uses'=>'Participants\ParticipantController@editParticipant']);
Route::get('/edit_participant_ajax', ['as' => 'participants.edit_participant_ajax','uses'=>'Participants\ParticipantController@editParticipantAjax']);
Route::get('/delete_participant', ['as' => 'participants.delete_participant','uses'=>'Participants\ParticipantController@deleteParticipant']);
Route::get('/delete_multiple_participant', ['as' => 'participants.delete_multiple_participant','uses'=>'Participants\ParticipantController@deleteMultipleParticipant']);
Route::get('/validation/{email}', ['as' => 'participants.validation','uses'=>'Participants\ParticipantController@validation']);
