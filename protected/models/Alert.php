<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("vendor/autoload.php");
include("protected/models/kanguroAlert.php");
$server = Ratchet\Server\IoServer::factory(
        new Ratchet\WebSocket\WsServer(kanguroAlert())
        ,8080,'0.0.0.0');
$server->run();