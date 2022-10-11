<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<?php
include_once 'conexao.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "INSERT INTO agenda 
        (nome_pac, dataAtend, horaAtend, id)
        VALUES (
'" . $dados['nome_pac'] . "',
'" . $dados['dataAtend'] . "',
'" . $dados['horaAtend'] . "',
'" . $dados['id'] = $_SESSION['id'] . "'
)";
$resultado_usario = mysqli_query($conn, $result_usuario);
if (mysqli_insert_id($conn)) {
    $_SESSION['msgcad'] = "Agendado";
    header("Location: index.php");
} else {
    $_SESSION['msg'] = "Erro ao agendar";
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
                                Agendamento Registrado!
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