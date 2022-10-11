<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include_once './assets/head.php';
include_once './assets/sidebar.php';
?>
<div class="page">
    <!-- navbar-->
    <?php
    include_once './assets/header.php';
    ?>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Consultas Anteriores</li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $lnk = mysqli_connect('localhost', 'root', '', 'projetopsichus');
                            $nome_pac = 'Luana Raiz';
                            $sql = mysqli_query($lnk, "SELECT * FROM atendimento 
                            WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."' and atendimento.nome_pac = '$nome_pac' ") or die("Erro");
                            $linhas = mysqli_num_rows($sql);
                            
                            while ($dados = mysqli_fetch_assoc($sql)) {
                            ?>
                                <a href="atender.php?id_cad_pac=<?php echo ($dados['id_cad_pac']); ?>" type="button" class="btn btn-warning">Visualizar</a>
                            <?php
                                echo $dados['data_regist_atend'] . "<br>", "<br>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once './assets/footer.php';
    ?>
</div>
<!-- JavaScript files-->
<?php
include_once './assets/jsfile.php';
?>