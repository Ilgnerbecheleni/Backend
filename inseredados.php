<?php

require_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$ativo = 1;



$consulta = $conexao->prepare("INSERT INTO usuarios
(nome, email, senha, ativo) VALUES (?,?,?,?)");

$consulta->bind_param("ssss", $nome, $email, $senha, $ativo);

$consulta->execute();

echo "Cadastro realizado com sucesso!";

?>