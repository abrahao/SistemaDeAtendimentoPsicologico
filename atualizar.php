<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php


$lnk = mysqli_connect('localhost', 'root', '', 'projetopsichus');
$id_pac = $_POST["id_pac"];
$nome_pac = $_POST["nome_pac"];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$cpfrg = $_POST['cpfrg'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$procedencia = $_POST['procedencia'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$outrasInfo = $_POST['outrasInfo'];

$update = mysqli_query($lnk, "UPDATE cadastro 
        SET nome_pac = '$nome_pac', nascimento = '$nascimento', sexo = '$sexo', cpfrg = '$cpfrg', telefone = '$telefone', email = '$email', procedencia = '$procedencia', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', outrasInfo = '$outrasInfo' 
        WHERE id_pac = $id_pac") or die("Erro ao atualizar");

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include_once './assets/head.php';
include_once './assets/sidebar.php';
?>
<div class="page">
    <?php
    include_once './assets/header.php';
    ?>
    <div class="breadcrumb-holder">
        <div class="container-fluid">
                <?php
                if ($update == true) : ?>
                    <?php ob_start() ?>
                    <script>
                        alert('Alterado!!');
                        window.location.replace("edit-cadastro.php");
                    </script>
                <?php
                endif ?>
        </div>
    </div>
</div>
<?php include_once './assets/footer.php';
?>
</div>
<?php
include_once './assets/jsfile.php';
?>