<?php 
namespace Phprachet;
session_start();

class ChatSession{

    private $chatId;
    private $sessionId;
    private $sender;
    private $receiver;
    private $msg;
    private $date_sent;
    protected $dbConn;
    
    function setSender($sender) {$this->sender=$sender;}
    function setReceiver($receiver){$this->receiver=$receiver;}
    function setMsg($msg){$this->msg=$msg;}
    function getSessionId() {return $this->sessionId;} 

    function __construct() {
        echo "Chat Session Initialized";
        
    }

    function setSessionId($connect){
        $sql="SELECT * FROM chat";
        $result=mysqli_query($connect,$sql);
        $num = rand(100,1000);
        if (mysqli_num_rows($result)>0){
            $data=mysqli_fetch_assoc($result);
            if ($data['sessionId']==$num){
                $num = rand(100,1000);    
                $this->sessionId=$num;     
            }
        }else{
            $this->sessionId=$num;
        }
    }

    function savetoDb($connect){
        echo "Saving to DB ... ";
        // $sql="INSERT INTO chat VALUES ($this->sessionId,'$this->sender','$this->receiver','$this->msg',CURRENT_DATE());";
        // if (mysqli_query($connect,$sql)){
        //      echo "Saved to DB!";
        // }
    }

    function getAllUsers($connect){
        $sql="SELECT * FROM users";
        $result=mysqli_query($connect,$sql);
        
        if (mysqli_query($connect,$sql)){
            echo '<input type="hidden" id="sendTo" value="">';
            
            while($data=mysqli_fetch_assoc($result)){
                if ($data["Username"]==$_SESSION['Username']){
                    continue;
                }
                
                echo "<br>";
                echo '<form action="" method="post">';
                echo '<button name="submit"  type="submit" value="'.$data["Name"].'">'.$data["Name"].'</button>';
                if (isset($_POST["submit"])){
                    $_SESSION["sendTo"]=$_POST["submit"];
                    
                    echo $_SESSION["sendTo"];
                    
                    header("Location: chatbox.php");
                }
                echo '</form>';
                echo "<br>";
            }
        }else{
            echo "Error: " ,mysqli_error($connect);
        }
    }

}


?>