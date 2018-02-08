<?php

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

$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');
$router->get('/logout', 'AuthController@logout');
$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/money/{money}','MoneyController@show');
$router->post('/money/addPayment','MoneyController@AddPayment');
$router->get('/clients','MoneyController@clients');
$router->get('/writers','MoneyController@writers');
$router->get('/shared','MoneyController@shared');
$router->get('/MarkAsPaid/{job}','MoneyController@MarkAsPaid');
$router->get('/MarkAsDone/{job}','MoneyController@MarkAsDone');
$router->get('/money','MoneyController@index');
$router->post('/post','MoneyController@store');
$router->put('/put/{updateid}','MoneyController@update');
$router->delete('/delete/{deleteid}','MoneyController@destroy');
