<?php 

class ChatSession{

    private $chatId;
    private $sender;
    private $receiver;
    private $msg;
    private $date_sent;
    protected $dbConnect;

    function __construct(){
        require_once("dbConnect.php");
        echo "Chat Session Initialized";
    }
    function setValues($sender,$receiver,$msg){
        //$this->chatId=$chatId;
        $this->sender=$sender;
        $this->receiver=$receiver;
        $this->msg=$msg;
        //$this->date_sent=$date_sent;
    }
    function savetoDb(){
        echo "Saving to DB ... ";
    }

}

?>