<?php

/**
 * Authentication
 */
$this->get('prisijungimas', [
    'as' => 'auth.view.login',
    'uses' => 'Auth\AuthController@loginPage',
]);
$this->post('prisijungimas', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@login',
]);
$this->get('patvirtinti-informacija', [
    'as' => 'auth.view.confirm-info',
    'uses' => 'Auth\AuthController@confirmInfoPage',
]);
$this->post('patvirtinti-informacija', [
    'as' => 'auth.confirm-info',
    'uses' => 'Auth\AuthController@confirmInfo',
]);

foreach (['google'] as $service) {
    $this->get("auth/$service", ['as' => "auth.$service", 'uses' => "Auth\AuthController@${service}"]);
    $this->get("auth/$service/callback", ['as' => "auth.$service.callback", 'uses' => "Auth\AuthController@${service}Callback"]);
}

/**
 * Index
 */

$this->get('/', [
    'as' => 'index',
    'uses' => 'IndexController@index',
]);
