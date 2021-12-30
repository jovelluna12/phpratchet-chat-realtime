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
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage=function(e){
            var message = JSON.parse(e.data);

            // var msg="\nFrom: "+message.sender+"\nMessage: "+message.msg;

            // var content=document.createTextNode(msg);
            // div.appendChild(content);

            var sendername=message.sender;
            console.log(message.sender);
            var sender="From: "+sendername;
            var msg="Message: "+message.msg;

            const newMsg=document.createElement("div");
            const newSpan=document.createElement("span");
            const newCnt=document.createElement("p");

            const senderPane=document.createTextNode(sender);
            const content=document.createTextNode(msg);

            newSpan.appendChild(senderPane);
            newCnt.appendChild(content);
            
            newMsg.appendChild(newSpan);
            newMsg.appendChild(newCnt);

            const div=document.getElementById("displayReceived");
            document.body.insertBefore(newMsg,div);


        }
        document.getElementById("message-form").addEventListener("onsubmit",function(e){
            e.preventDefault();
        });
        function sendmessage(){
            var input=document.getElementById("text-field").value;
            const sender_name=document.getElementById("name").value;
            
            const data={
                sender:sender_name,
                msg:input
            };
            if (input==""){
                console.log("empty");
            }
            else{
                document.getElementById("message-form").reset();

                // var sendername="You";
                // var sender="From: "+sendername;
                // var msg="Message: "+input;

                // const newMsg=document.createElement("div");
                // const newSpan=document.createElement("span");
                // const newCnt=document.createElement("p");

                // const senderPane=document.createTextNode(sender);
                // const content=document.createTextNode(msg);

                // newSpan.appendChild(senderPane);
                // newCnt.appendChild(content);

                // const div=document.getElementById("displayReceived");
                // document.body.insertBefore(newMsg, div);

                conn.send(JSON.stringify(data));
            }

        }
    </script>
</body>
</html>