<?php 
namespace Phprachet;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

include("C:/xampp/htdocs/Chat with Login/chatSession.php");

class app implements MessageComponentInterface{
    protected $clients;
    protected $db;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        
        echo "Server is Up and Running";
    }

    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
        echo "\nConnection Detected from ({$conn->resourceId})";

    }
    public function onMessage(ConnectionInterface $from, $msg){
        $db=include("dbConnect.php");
        $data=json_decode($msg);

        echo $data->sendTo;
        $chatsession=new ChatSession;
        $chatsession->setSender($data->sender);
        $chatsession->setMsg($data->msg);

        $chatsession->savetoDb($db);      
        
        foreach ($this->clients as $client) {
            $client->send($msg);
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