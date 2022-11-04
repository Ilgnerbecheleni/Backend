<?php
require_once("conexao.php");

if(isset($_POST['codigo'])){
	$codigo = (int)$_POST['codigo'];
	
	$sql = "DELETE FROM usuarios WHERE cod = {$codigo};";
	
	$conexao->query($sql);
	
	echo "Registro excluído com sucesso.";	
}

?>