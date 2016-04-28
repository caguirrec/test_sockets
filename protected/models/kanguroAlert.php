<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
class kanguroAlert implements MessageComponentInterface{
    protected $clients;
    
    public function __construct() {
        $this->clients= new \SplObjectStorage;
    }

    public function onClose(\Ratchet\ConnectionInterface $conn) {
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(\Ratchet\ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function onMessage(\Ratchet\ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onOpen(\Ratchet\ConnectionInterface $conn) {
        $this->clients->attach($conn);
        var_dump("connection");
    }

}