<?php
session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="assets/styleLogin.css">

<body>

    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <span> <img src="assets/images/logo_many.png" class="w-75" alt="Logo"> </span><br />
                <span class="logo_title mt-5"> Login de Acesso </span>
            </div>
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                if (isset($_SESSION['msgcad'])) {
                    echo $_SESSION['msgcad'];
                    unset($_SESSION['msgcad']);
                }
                ?>
                <form method="POST" action="valida.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnLogin" value="Acessar" class="btn btn-outline-danger float-left login_btn">
                    </div>

                    <div class="form-group">
                        <a href="./cadastro_psicologo.php">
                            <input name="btn" value="Cadastre-se" class="btn btn-outline-danger float-right login_btn">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>