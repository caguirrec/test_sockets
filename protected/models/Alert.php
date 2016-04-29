<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require 'vendor/autoload.php';
    require 'kanguroAlert.php';
    use Ratchet\ConnectionInterface;
    echo(gethostbyname(gethostname()));
    $app = new Ratchet\App(gethostbyname(gethostname()), 8080, '0.0.0.0');
    $app->route('/chat', new kanguroAlert(),array('*'));
    $server = Ratchet\Server\IoServer::factory($app, 8080, '0.0.0.0');
    $server->run();
    