<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("vendor/autoload.php");

$server = Ratchet\Server\IoServer::factory(
                new kanguroAlert()
        ,1144);
$server->run();