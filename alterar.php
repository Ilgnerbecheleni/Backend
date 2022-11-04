<?php

session_start();

$status = $_SESSION['login'];

if($status){
    require_once("conexao.php");

    $id = $_GET['id'];
    
    $sql = "SELECT cod, nome, email, ativo FROM usuarios
     WHERE cod = {$id}";
     
    $consulta = $conexao->query($sql);
    
    $linha = mysqli_fetch_array($consulta);
    
    //print_r($linha);
}else{
    header("Location: erro.php");

    die();
}




?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

            <form action="editardados.php" name="frmCadastro" id="frmCadastro">
                    <input type="hidden" name="codigo" value="<?php echo $linha['cod']; ?>">
			        Código: <br/><?php echo $linha['cod']; ?><br/>
                <label for="name">Nome</label><input type="text" value="<?php echo $linha['nome']; ?>" name="nome"
                    id="nome" required>
                <label for="senha">Senha</label><input type="password" name="senha" id="senha" >
                <label for="email">E-mail</label><input type="email" value="<?php echo $linha['email']; ?>" name="email"
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


            <div id="simple-msg"></div>

        </nav>

		
		<script>
			$(function(){
				
				$("#cadastrar").click(function(){

					$("#frmCadastro").submit(function(e)
					{
						
						var postData = $(this).serializeArray();
						var formURL = $(this).attr("action");
						$.ajax(
						{
							url : formURL,
							type: "POST",
							data : postData,
							success:function(data, textStatus, jqXHR) 
							{
								$("#simple-msg").html(data);
								$("#senha").val("");
								
							},
							error: function(jqXHR, textStatus, errorThrown) 
							{
								
								var error = textStatus + '<br/>' +errorThrown;
								$("#simple-msg").html(error);
							}
						});
						e.preventDefault();	//STOP default action
						e.unbind();
					});
					
				});
				
			});

		</script>
    </body>

</html>