<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html{
            width: 100%;
            height: 100%;
            font-family: 'Poppins';font-size: 24px;
            /* background-color: rgb(255, 254, 211); */
        }
        .block{
            width: 70%;
            height: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid rgb(0, 0, 75);
            text-align: center;
            border-radius: 7px;
        }
        button{
            text-decoration: none;
            border: 1px solid black;
            border-radius: 7px;
            padding: 10px 30px;    
            background-color: rgb(56, 202, 56);       
            font-size: 1.5em;
            color: white;

        }
        button:hover{
            background-color: rgb(42, 149, 42);
        }
        h1{
            margin-bottom: 15px;
        }
        h1,button{
            position: relative;
            top: 40%;
        }
        img{
            position: absolute;
            top: 4%;
            left: 15%;
            width: 300px;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>

    <div class="block">
        <img src="images/logoMail.png">
        <h1>Verified Your Account</h1>
<x-mail::button :url="$actionUrl">
{{ $actionText }}
</x-mail::button>
    </div>
</body>
</html>