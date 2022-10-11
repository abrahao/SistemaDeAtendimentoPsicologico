<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
    exit();
}
?>



<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
                Notificações do Sitema
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="text-align: center">
                        <div class="card-body">

                                <?php
                                $lnk = mysqli_connect('localhost', 'root', '', 'projetopsichus');
                                $sql = mysqli_query($lnk, "SELECT * FROM sistema WHERE id_sistema");
                                $linhas = mysqli_num_rows($sql);

                                ?>


                                <table class="table table-hover ">
                                    <thead>
                                        <th>Data</th>
                                        <th>Mensagem</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($dados = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo date("d/m/Y", strtotime($dados['data_notify']));
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $dados['notify']?>
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