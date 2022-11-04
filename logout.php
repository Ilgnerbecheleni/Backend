<?php
session_start();
$_SESSION["login"] = false;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro</title>
        <style>
        body {
            background: url('./obrigado.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
           
            text-transform: uppercase;
            text-align: center;
        }
        </style>
    </head>

    <body>
        <h1>Obrigado Por utilizar o Sistema</h1>

        <script>
        setTimeout(() => {
            window.location.replace("index.php");
        }, 5000)
        </script>
    </body>

</html>