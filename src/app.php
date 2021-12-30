<?php 
namespace Phprachet;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class app implements MessageComponentInterface{
    protected $clients;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        echo "Server is Up and Running";
    }

    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
        echo "\nConnection Detected from ({$conn->resourceId})";
        
    }
    public function onMessage(ConnectionInterface $from, $msg){
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }    
    }
    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
        echo "\nConnection Terminated from ({$conn->resourceId})";
    }
    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close(); 
    }
}