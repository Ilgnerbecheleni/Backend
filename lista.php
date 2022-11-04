<?php
require_once("conexao.php");

$sql = "SELECT cod, nome, email, ativo FROM usuarios";

$consulta = $conexao->query($sql);
session_start();
$verifica = $_SESSION["login"] ;
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Lista de Usuários</title>
        <meta charset="UTF-8" />
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" />

        <script>
        function confirma(id) {
            var ok = confirm("Deseja realmente excluir este registro?");
            if (ok) {
                $.post("excluir_dados.php", {
                    codigo: id
                }, function(result) {
                    /*
                    var painel = '#linha' + id;
                    $(painel).remove();
                    */
                    alert(result);
                    location.reload();
                });

            } else {
                return false;
            }

        }
        </script>
        <style>
        .btn-cadastro {
            padding: 10px;
            background-color: green;
            text-transform: uppercase;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .btn-excluir {
            padding: 5px;
            background-color: red;
            text-transform: uppercase;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .btn-editar {
            padding: 5px;
            background-color: blue;
            text-transform: uppercase;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .control {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        </style>



    </head>

    <body>
        <div id="page">
            <div class='control'>
                <h1>Lista de Usuários</h1>

                <?php 

if($verifica){
echo "<a href='cadastro.php' class='btn-cadastro'>Cadastrar</a>";
}else{
    echo "";
}

?>



            </div>

            <table id="usuarios" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ativo</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                   

if($verifica == true){
   
           

    while($linha = mysqli_fetch_array($consulta)){
        echo "<tr id='linha{$linha['cod']}'>";
        echo "<td>".$linha['cod']."</td>";
        echo "<td>".$linha['nome']."</td>";
        echo "<td>".$linha['email']."</td>";
        echo "<td>".$linha['ativo']."</td>";
        echo "<td><a href='alterar.php?id={$linha['cod']}' class='btn-editar'>Editar</a></td>";
        echo "<td><a href='javascript:confirma({$linha['cod']});' class='btn-excluir'>Excluir</a></td>";
        echo "</tr>";
    }
}else{
    header("Location: erro.php");

    die();
}


			?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ativo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

            <script>
            $(document).ready(function() {
                $('#usuarios').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                    }
                });
            });
            </script>

        </div>
    </body>

</html>