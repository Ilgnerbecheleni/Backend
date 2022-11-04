<?php

require_once("conexao.php");


session_start();




$nome = $_POST["nome"];
$senha =  sha1($_POST["senha"]);

echo $nome;
echo "</br>";
echo $senha;



$sql = "SELECT * FROM backend.usuarios where nome = '{$nome}' ;";

$consulta = $conexao->query($sql);

if ($consulta) {

    while ($linha = mysqli_fetch_array($consulta)) {


        if ($linha['nome'] == $nome  && $linha['senha'] == $senha) {
            header("Location: lista.php");
            $_SESSION["login"] = true;

            die();
            break;
        }
    }

    header("Location: erro.php");

    die();
}
