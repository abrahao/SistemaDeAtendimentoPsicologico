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
    <?php
    include_once './assets/header.php';
    ?>
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Agendar Consulta</li>
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
                            while ($dados = mysqli_fetch_assoc($sql)) {
                            ?>
                                <a href="agend_pac_cad_redirect.php?id_pac=<?php echo ($dados['id_pac']); ?>" type="button" class="btn btn-warning">Agendar</a>
                            <?php
                                echo $dados['nome_pac'] . "<br>","<br>";
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
<?php
include_once './assets/jsfile.php';
?>