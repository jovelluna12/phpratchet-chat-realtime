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

    <div id="displayReceived"></div>
    

    <script>
        var conn = new WebSocket('ws://localhost:8080');
        const userID=Math.floor(Math.random() * 10000) + 1000;
        const username=document.getElementById("name").value;

        // var senderID;
        // var sendername;

        const userDetails={
            type:"user_info",
            userId:userID,
            name:username
        };

        conn.onopen = function(e) { 
            console.log("Connection established!");
            
        };

        conn.onmessage=function(e){
            var message = JSON.parse(e.data);

            if(typeof message.userId != 'undefined'){
                senderID=message.userId;
                sendername=message.name;
                //console.log(senderID+" "+sendername);
            }    
            else if(message.type==="new message"){
                var sendername=message.sender;
                if (message.sender===username){
                    sendername="You";
                }
                
                var sender="From: "+sendername;
                var msg="Message: "+message.msg;

                const newMsg=document.createElement("div");
                const newSpan=document.createElement("span");
                const newCnt=document.createElement("p");
                const separate=document.createElement("hr");

                const senderPane=document.createTextNode(sender);
                const content=document.createTextNode(msg);

                newSpan.appendChild(senderPane);
                newCnt.appendChild(content);
                
                newMsg.appendChild(newSpan);
                newMsg.appendChild(newCnt);

                const div=document.getElementById("displayReceived");
                document.body.insertBefore(newMsg,div);
                document.body.insertBefore(separate,newMsg);

            }
            
        }
        document.getElementById("message-form").addEventListener("onsubmit",function(e){
            e.preventDefault();
        });
        function sendmessage(){
            var input=document.getElementById("text-field").value;
            
            const data={
                type:"new message",
                senderID:userID,
                sender:username,
                msg:input
            };
            if (input===""){
                console.log("empty");
            }
            else{
                document.getElementById("message-form").reset();
                conn.send(JSON.stringify(userDetails));
                conn.send(JSON.stringify(data));

            }

        }
    </script>
</body>
</html>