<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro</title>
        <style>
        body {
            background: url('./erro.png');
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
            color: white;
            text-transform: uppercase;
            text-align: center;
        }
        </style>
    </head>

    <body>
        <h1>Desculpe Não achamos o usuário solicitado</h1>

        <script>
        setTimeout(() => {
            window.location.replace("login.php");
        }, 5000)
        </script>
    </body>

</html>