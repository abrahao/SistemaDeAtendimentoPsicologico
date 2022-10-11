<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
    exit();
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Atendimentos Anteriores</li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">

                    <div class="card" style="text-align: center">
                        <div class="card-body">
                                <?= $_GET['nome_pac'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card" style="text-align: center">
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
                        <table class="table table-hover ">
                            <thead>
                                <th>Data/Hora</th>
                                <th>Ação</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo date("d/m/Y h:i:s a", strtotime($dados['data_regist_atend']));
                                            ?>
                                        </td>
                                        <td>
                                            <a href="show_consult_ant.php?id_cad_pac=<?php echo ($dados['id_cad_pac']); ?>&id_atend=<?php echo ($dados['id_atend']); ?>" target="blank" type="button" class="btn btn-warning">Visualizar</a>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php
                                }
                        ?>
                        </table>
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