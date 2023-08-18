<?php

$router->get('/', 'UserController@index');
$router->get('/user/{id}', 'UserController@show');
$router->get('/user/search', 'UserController@search');
$router->get('/user/create', 'UserController@create');
$router->post('/user', 'UserController@store');
$router->get('/training/{id}', 'TrainingController@show');
$router->get('/training/create', 'TrainingController@create');
$router->post('/training', 'TrainingController@store');