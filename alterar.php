<?php
require_once("conexao.php");

$id = $_GET['id'];

$sql = "SELECT cod, nome, email, ativo FROM usuarios
 WHERE cod = {$id}";
 
$consulta = $conexao->query($sql);

$linha = mysqli_fetch_array($consulta);

//print_r($linha);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cadastro</title>

        <style>
        nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: start;
            width: 40%;
            gap: 10px;
        }

        input[type="text"],
        [type="email"],
        [type="password"] {
            height: 30px;
            width: 450px;
        }

        input[type="submit"] {
            height: 30px;
            width: 150px;
            text-transform: uppercase;
            color: white;
            background: green;
            border: none;
            border-radius: 10px;
        }

        a {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 150px;
            text-transform: uppercase;
            color: white;
            background: red;
            border: none;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn {
            margin-top: 20px;
            display: flex;
            width: 450px;
            justify-content: space-around;
        }

        fieldset {
            margin-top: 50px;
            padding: 30px;
            border-radius: 10px;
        }

        legend {
            text-transform: uppercase;
            margin: 0 10px;

        }
        </style>



    </head>

    <body>
        <nav>

            <form action="editardados.php">
                <label for="name">Nome</label><input type="text" value="<?php echo $linha['nome']; ?>" name="nome"
                    id="nome" required>
                <label for="senha">Senha</label><input type="text" name="senha" id="senha" required>
                <label for="email">E-mail</label><input type="email" value="<?php echo $linha['nome']; ?>" name="email"
                    id="email" required>
                <label for="ativo">Ativo</label>
                <select name="ativo" id="ativo">
                    <option></option>
                    <option value="1" <?php if($linha['ativo'] == 1) echo "selected"; ?>>Ativo</option>
                    <option value="0" <?php if($linha['ativo'] == 0) echo "selected"; ?>>Inativo</option>
                </select>
                <div class='btn'><input type="submit" value="Cadastrar" id="cadastrar"> <a
                        href="lista.php">Voltar</a></div>
            </form>



        </nav>
    </body>

</html>