<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>
<header>
    <a href="sample.html" id="go_back">Go Back</a>
</header>
<body>
    <style>
        body{
            background: #C9956B;
        }
        header{              
            height: 90px;  
            width: 100%;
            background: #BB7944;
        }
        
        #go_back{
            position: absolute;
            width: 240px;
            height: 60px;
            left: 1300px;
            top: 15px;
            text-decoration: none;
            color: black;
            font-family: 'Reem Kufi', sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 48px;
            line-height: 72px;
            text-align: center;
        }
    </style>
    <?php
        session_start();
        $name=$_SESSION["name"];
        echo '<input type="hidden" id="name" value="'.$name.'">';
        
    ?>
    <form action="#" id="message-form" onsubmit="sendmessage()">
        <input type="text" id="text-field" placeholder="Send Message"> <input type="submit" value="Send">
    </form>

    
    <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };
        conn.onmessage = function(e) {
            
        };
        
    </script>
</body>
</html>