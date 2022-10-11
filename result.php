<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><?php include_once './assets/head.php'                                                                                                                                                                                                                ?>

<body>
    <!-- Side Navbar -->
    <?php
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
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Iniciar Atendimento </li>
                </ul>
            </div>
        </div>
        <section class="charts">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="searchform" method="post" action="result.php">
                                <div class="form-group row">
                                    <!-- <div class="col-sm-3">
                                        <input type="text" name="buscar" class="form-control" value="<?= $_GET['codigo'] ?>" placeholder="Informe o código para consulta">
                                    </div> -->
                                    <div class="col-sm-2">
                                        <!-- <button class="btn btn-success mb-4">Consultar</button> -->
                                    </div>
                                </div>
                            </form>

                            <script src="tinymce/js/tinymce/tinymce.min.js"></script>
                            <script>
                                tinymce.init({
                                    selector: 'textarea#tiny',
                                    height: "380",
                                    width: "640"
                                });
                            </script>

                            <?php
                            $buscar = $_POST['buscar'];
                            $conexao = new mysqli("localhost:3311", "root", "", "projetopsichus");
                            $sql = mysqli_query($conexao, "SELECT * FROM cadastro WHERE nome_pac LIKE '%" . $buscar . "%' ");
                            $row = mysqli_num_rows($sql);

                            if ($row > 0) {
                                while ($linha = mysqli_fetch_array($sql)) {
                                    $nome_pac = $linha['nome_pac'];
                                    echo $nome_pac;
                                    echo "<br/> <br/>";

                                    echo '<div>
                                    <textarea id="tiny"></textarea>
                                  </div>';

                                    echo '<div class="col-sm-2">
                                    <button class="btn btn-success mb-4">Buscar</button>
                                </div>';
                                }
                            } else {
                                echo "Paciente não cadastrado!";
                            }

                            ?>

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
</body>