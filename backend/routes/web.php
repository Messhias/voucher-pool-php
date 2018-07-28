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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/recipients', 'RecipientsController@get');
$router->get('/recipients/{id}', 'RecipientsController@find');
$router->post('/recipients', 'RecipientsController@create');
$router->put('/recipients/{id}', 'RecipientsController@update');
$router->delete('/recipients/{id}', 'RecipientsController@delete');


$router->get('/special/offer', 'SpecialsOffersController@get');
$router->get('/special/offer/{id}', 'SpecialsOffersController@find');
$router->post('/special/offer', 'SpecialsOffersController@create');
$router->put('/special/offer/{id}', 'SpecialsOffersController@update');
$router->delete('/special/offer/{id}', 'SpecialsOffersController@delete');


$router->get('/voucher/code', 'VouchersCodesController@get');
$router->get('/voucher/code/{id}', 'VouchersCodesController@find');
$router->post('/voucher/code', 'VouchersCodesController@create');
$router->put('/voucher/code/{id}', 'VouchersCodesController@update');
$router->delete('/voucher/code/{id}', 'VouchersCodesController@delete');
