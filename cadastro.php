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
            <fieldset>
                <legend>Cadastro</legend>

                <form action="inseredados.php" name="frmCadastro" id="frmCadastro">
                    <label for="name">Nome</label><input type="text" name="nome" id="nome" required>
                    <label for="senha">Senha</label><input type="password" name="senha" id="senha" required>
                    <label for="email">E-mail</label><input type="email" name="email" id="email" required>
                    <div class='btn'><input type="submit" value="Cadastrar" id="cadastrar"> <a
                            href="lista.php">Voltar</a></div>
                </form>

            </fieldset>

            <div id="simple-msg"></div>


        </nav>


        <script>
        $(function() {

            $("#cadastrar").click(function() {

                $("#frmCadastro").submit(function(e) {

                    var postData = $(this).serializeArray();
                    var formURL = $(this).attr("action");
                    $.ajax({
                        url: formURL,
                        type: "POST",
                        data: postData,
                        success: function(data, textStatus, jqXHR) {
                            $("#simple-msg").html(data);
                            $('#frmCadastro')[0].reset();

                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                            var error = textStatus + '<br/>' + errorThrown;
                            $("#simple-msg").html(error);
                        }
                    });
                    e.preventDefault(); //STOP default action
                    e.unbind();
                });

            });

        });
        </script>




    </body>





</html>