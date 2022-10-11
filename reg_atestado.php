<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include_once './assets/head.php';
include_once './assets/sidebar.php';
?>
<div class="page">
    <?php
    include_once './assets/header.php';
    ?>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Atendimentos Agendados</li>
            </ul>
        </div>
    </div>

    <?php
    require_once "conexao.php";

    $registros = [];
    $conexao = novaConexao();

    $sql = "SELECT * FROM emitAtest";
    $resultado = $conexao->query($sql);
    ?>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="text-align: center">
                        <div class="card-body">

                        <?= $registro['conteudo'] ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once './assets/footer.php';
    ?>
</div>
<?php
include_once './assets/jsfile.php';
?>