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
                <li class="breadcrumb-item active">Pacientes Cadastrados </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <?php
                            $servidor = "localhost";
                            $usuario = "root";
                            $senha = "";
                            $dbname = "projetopsichus";

                            // Create connection
                            $conn = new mysqli($servidor, $usuario, $senha, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = mysqli_query($conn, "SELECT * FROM cadastro WHERE id ='" . $_SESSION['id'] . "'") or die("Erro");

                            $linhas = mysqli_num_rows($sql);

                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <th>Paciente</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dados = mysqli_fetch_assoc($sql)) {
                                    ?>

                                        <tr>
                                            <td>
                                                <a href="detalhes_pac.php?id_pac=<?= ($dados['id_pac']); ?>"><?php echo $dados['nome_pac'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="submit" class="mr-3 btn btn-warning">
                                                <a href="alterar.php?id_pac=<?php echo ($dados['id_pac']) ?>">Alterar
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                        ?>
                                </tbody>
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
<!-- JavaScript files-->
<?php
include_once './assets/jsfile.php';
?>