<style>
    .btn-primary {
        background-color: rgb(114, 96, 153);
        border-color: rgb(114, 96, 153);
    }
</style>

<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<?php
$lnk = mysqli_connect('localhost', 'root', '', 'projetopsichus');
$id_cad_pac = $_GET['id_cad_pac'];
$nome_pac = $_GET['nome_pac'];
$sql = mysqli_query($lnk, "SELECT * FROM cadastro WHERE id_cad_pac='$id_cad_pac'") or die("Erro");
$linhas = mysqli_num_rows($sql);
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
                <li class="breadcrumb-item active">Cadastrar Paciente</li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="./list_consult_ant.php?id_cad_pac=<?php echo $id_cad_pac ?>&id_atend=<?php echo $id_atend ?>" target="blank"><button style="background: #00FF00; border-radius: 3px; padding: 7.5px; cursor: pointer; color: #000000; border: none; font-size: 16px;">
                                    Consultas Anteriores</button></a>
                            <a href="./atestado.php" target="blank"><button style="background: #00FF00; border-radius: 3px; padding: 7.5px; cursor: pointer; color: #000000; border: none; font-size: 16px;">
                                    Emitir Atestado Psicologico</button></a>
                            <a href="./laudo.php" target="blank"><button style="background: #7CFC00; border-radius: 3px; padding: 7.5px; cursor: pointer; color: #000000; border: none; font-size: 16px;">
                                    Emitir Laudo Psicologico</button></a>
                            <a href="./parecer.php" target="blank"><button style="background: #7FFF00; border-radius: 3px; padding: 7.5px; cursor: pointer; color: #000000; border: none; font-size: 16px;">
                                    Emitir Parecer Psicologico</button></a>
                            <br><br>

                            <?php
                            while ($dados = mysqli_fetch_assoc($sql)) {
                            ?>

                                <form action="atender_salvar.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input readonly type="text" tabindex="1" class="mr-3 form-control" id="id_cad_pac" name="id_cad_pac" value="<?= $dados['id_cad_pac'] ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input readonly type="text" tabindex="1" class="mr-3 form-control" id="nome_pac" name="nome_pac" placeholder="Nome Completo *" value="<?= $dados['nome_pac'] ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <textarea required type="text" tabindex="2" rows="15" cols="100" class="mr-3 form-control <?= $erros['notaAtend'] ? 'is-invalid' : '' ?>" id="notaAtend" name="notaAtend" placeholder="Notas de atendimento *" value="<?= $dados['notaAtend'] ?>"></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $erros['notaAtend'] ?>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                    <button type="submit" class="mr-3 btn btn-primary">Salvar</button>
                                </form>
                            <?php
                            }
                            ?>
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