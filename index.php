<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e91e8bd13f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <h1>Acesse o sistema...</h1>
    <main>
        <fieldset>
            <form method="post" action="autenticacao.php" >
               <div><label for=""><i class="fa-solid fa-user icon"></i></label><input type="text" name="nome" id="nome"></div>
               <div><label for=""><i class="fa-solid fa-lock icon"></i></label><input type="password" name="senha" id="senha"></div>
               <input type="submit">
            </form>
        </fieldset>
    </main>



</body>

</html>