<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBox Sample</title>
</head>
<body>
    <?php
        session_start();
        $name=$_SESSION["name"];
        echo '<input type="hidden" id="name" value="'.$name.'">';
        

        ?>
    <form action="#" id="message-form" onsubmit="sendmessage()">
        <input type="text" id="text-field" placeholder="Send Message"> <input type="submit" value="Send">
    </form>

    <div id="display"></div>

    <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage=function(e){
            var message = JSON.parse(e.data);
            var msg="\nFrom: "+message.sender+"\nMessage: "+message.msg;
            var div=document.getElementById("display");
            var content=document.createTextNode(msg);
            div.appendChild(content);
        }
        document.getElementById("message-form").addEventListener("onsubmit",function(e){
            e.preventDefault();
        });
        function sendmessage(){
            var input=document.getElementById("text-field").value;
            var name=document.getElementById("name").value;
            
            var data ={
                sender:name,
                msg:input
            };
            if (input==""){
                console.log("empty");
            }
            else{
                document.getElementById("message-form").reset();
                var msg="\nFrom: You"+"\nMessage: "+input;
                var div=document.getElementById("display");
                var content=document.createTextNode(msg);
                div.appendChild(content);
                
                conn.send(JSON.stringify(data));
            }

        }
    </script>
</body>
</html>