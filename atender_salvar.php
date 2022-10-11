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
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>

                            <div class="alert alert-success" role="alert">
                                <?php
                                include_once './assets/head.php';

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

                                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                //var_dump($dados);

                                $sql = "INSERT INTO atendimento 
  (notaAtend, nome_pac, id_pac, id) VALUES (
					          
                    '" . $dados['notaAtend'] . "',
                    '" . $dados['nome_pac'] . "',
                    '" . $dados['id_pac'] . "',
                    '" . $dados['id'] = $_SESSION['id'] . "'
					)";

                                if ($conn->query($sql) === TRUE) {
                                    echo "Dados do atendimento salvos!";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                $conn->close();
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</section>
<?php include_once './assets/footer.php';
?>
</div>
<!-- JavaScript files-->
<?php
include_once './assets/jsfile.php';
?>