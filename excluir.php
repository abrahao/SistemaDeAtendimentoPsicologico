<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
include_once './assets/head.php'
?>

<body>
    <!-- Side Navbar -->

    <?php
    include_once './assets/sidebar.php'
    ?>

    <div class="page">
        <!-- navbar-->
        <?php
        include_once './assets/header.php'
        ?>
        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Excluir Cadastro</li>
                </ul>
            </div>
        </div>
        <!-- Counts Section -->
        <section class="dashboard-counts section-padding">
            <div class="container-fluid">
                <header>
                    <h1 class="h3 display">Excluir Cadastro</h1>
                </header>
                <div class="row">

                    <?php
                    require_once "conexao.php";

                    $registros = [];
                    $conexao = novaConexao();

                    if ($_GET['excluir']) {
                        $excluirSQL = "DELETE FROM cadastro WHERE id = ?";
                        $stmt = $conexao->prepare($excluirSQL);
                        $stmt->bind_param("i", $_GET['excluir']);
                        $stmt->execute();
                    }

                    $sql = "SELECT id, nome_pac, nascimento FROM cadastro";
                    $resultado = $conexao->query($sql);
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            $registros[] = $row;
                        }
                    } elseif ($conexao->error) {
                        echo "Erro: " . $conexao->error;
                    }

                    $conexao->close;
                    ?>

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php foreach ($registros as $registro) : ?>
                                <tr>
                                    <td><?= $registro['id'] ?></td>
                                    <td><?= $registro['nome_pac'] ?></td>
                                    <td>
                                        <?=
                                            date('d/m/Y', strtotime($registro['nascimento']))
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?dir=db&file=excluir_2&excluir=<?= $registro['id'] ?>" class="btn btn-danger">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <style>
                        table>* {
                            font-size: 1.2rem;
                        }
                    </style>

                </div>
            </div>
        </section>
        <?php
        include_once './assets/footer.php'
        ?>
    </div>
    <?php
    include_once './assets/jsfile.php'
    ?>
</body>

</html>