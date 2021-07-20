<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Authors micro service";
});

$router->get('/authors','AuthorController@index');
$router->post('/authors','AuthorController@store');
$router->get('/authors/{author}','AuthorController@show');
$router->patch('/authors/{author}','AuthorController@update');
$router->put('/authors/{author}','AuthorController@update');
$router->delete('/authors/{author}','AuthorController@destroy');
