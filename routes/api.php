<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/teams', 'ApiController@teams');
Route::get('/team/{id}', 'ApiController@teamGetById');
Route::delete('/team/{id}', 'ApiController@teamDelete');
Route::get('/player/{id}', 'ApiController@playerById');
Route::post('/create-team', 'ApiController@createTeam');
Route::post('/create-team/{id}', 'ApiController@updateTeam');
Route::post('/create-player/{id}', 'ApiController@createPlayer');
Route::delete('/delete-player/{id}', 'ApiController@deletePlayer');
Route::get('/player-id/{id}', 'ApiController@playerByprimeId');
Route::post('/update-player/{id}', 'ApiController@updatePlayer');
