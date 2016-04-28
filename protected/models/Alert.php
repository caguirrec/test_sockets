<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require '../../vendor/autoload.php';
    require '../kanguroAlert.php';
    $server = Ratchet\Server\IoServer::factory(
        new \Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(new kanguroAlert()))
        ,8080,'0.0.0.0');
$server->run();