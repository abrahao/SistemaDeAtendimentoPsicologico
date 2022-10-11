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
                            // $nome = $_GET['id_cad_pac'];
                            $id_cad_pac = $_GET['id_cad_pac'];
                            $id_cad_pisc = $dados['id_cad_pisc'];
                            $sql = mysqli_query($lnk, "SELECT * FROM atendimento
                            WHERE id_cad_psic ='" . $_SESSION['id_cad_psic'] . "' AND id_cad_pac = id_cad_pac AND id_cad_pac = '$id_cad_pac' ") or die("Erro");
                            $linhas = mysqli_num_rows($sql);

                            ?>

                            <button type="button" onclick="window.close()" class="btn btn-info">Voltar ao Antendimento</button>
                            <br>

                            <br>
                            <?php
                            while ($dados = mysqli_fetch_assoc($sql)) {
                            ?>

                                <a href="show_consult_ant.php?id_cad_pac=<?php echo ($dados['id_cad_pac']); ?>&id_atend=<?php echo ($dados['id_atend']); ?>" target="blank" type="button" class="btn btn-warning">Visualizar</a>
                            <?php
                                echo "<br>";
                                echo "ID atendimento =  " . ($dados['id_atend']);
                                echo "<br>";
                                echo date('d/m/Y', strtotime($dados['data_regist_atend']));
                                echo "<br>";
                                echo "<br>";
                            }
                            ?>
                            <br>
                            <a href="show_consult_ant.php?id_cad_pac=<?php echo ($dados['id_cad_pac']); ?>&id_atend=<?php echo ($dados['id_atend']); ?>" target="blank" type="button" class="btn btn-warning">Visualizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once './assets/footer.php';
    ?>
</div>
<?php
include_once './assets/jsfile.php';
?>