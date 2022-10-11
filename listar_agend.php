<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>
    @media (max-width: 480px) {
        .table thead {
            display: none;
        }

        .table td {
            border: 0;
        }

        .table td:not(:first-child) {
            display: flex;
        }
    }
</style>

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
    $sql = "SELECT * FROM agenda WHERE id ='" . $_SESSION['id'] . "'";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row;
        }
    } elseif ($conn->error) {
        echo "Erro: " . $conn->error;
    }

    $conn->close;
    ?>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="text-align: center">
                        <div class="card-body">

                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <th>Paciente</th>
                                    <th>Atender no dia</th>
                                    <th>Às</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($registros as $registro) : ?>
                                        <tr>
                                            <td>
                                                <?= $registro['nome_pac'] ?>
                                            </td>
                                            <td>
                                                <?=
                                                date('d/m/Y', strtotime($registro['dataAtend']))
                                                ?>
                                            </td>
                                            <td><?= $registro['horaAtend'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary">
                                                    <a href="./construct_page.php" style="color: white;">Atender</a></button>
                                                <button type="button" class="btn btn-warning">
                                                    <a href="./construct_page.php" style="color: black;">Alterar</a></button>
                                                <button type="button" class="btn btn-danger">Remover</button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

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