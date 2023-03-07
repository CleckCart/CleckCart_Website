<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
</head>
<body>
    <form method="post" action="./send.php">
        Email : <input type="text" name="recieverEmail"/><br/>
        Subject : <input type="text" name="senderSubject"/><br/>
        Message : <input type="text" name="senderMessage"/>
        <input type="submit" value="Send" name='send'/>
    </form>
</body>
</html>