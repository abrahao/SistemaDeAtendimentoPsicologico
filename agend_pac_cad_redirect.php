<?php
session_start();
if (!$_SESSION['nome']) {
    header('Location: login.php');
}
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
                <li class="breadcrumb-item active">Agendamento</li>
            </ul>
        </div>
    </div>

    <section class="forms">
        <div class="container-fluid">

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
            $id_pac = $_GET['id_pac'];
            $sql = mysqli_query($conn, "SELECT * FROM cadastro WHERE id_pac='$id_pac'") or die("Erro");
            $linhas = mysqli_num_rows($sql);

            while ($dados = mysqli_fetch_assoc($sql)) {
            ?>

                <form action="" method="POST">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card" style="text-align: center">
                                <div class="card-body">
                                    <input readonly type="text" tabindex="1" class="mr-3 form-control" id="nome_pac" name="nome_pac" placeholder="Nome Completo *" value="<?= $dados['nome_pac'] ?>">
                                </div>
                            </div>
                        </div>

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

                        $result_usuario = "INSERT INTO agenda (nome_pac, dataAtend, horaAtend, id) VALUES (
					          
                    '" . $dados['nome_pac'] . "',
                    '" . $dados['dataAtend'] . "',
                    '" . $dados['horaAtend'] . "',
                    '" . $dados['id'] = $_SESSION['id'] . "'
                    )";

                        $resultado_usario = mysqli_query($conn, $result_usuario);
                        if (mysqli_insert_id($conn)) {
                            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
                            header("Location: index.php");
                        } else {
                            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
                        }
                        ?>

                        <div class="col-sm-4">
                            <div class="card" style="text-align: center">
                                <div class="card-body">
                                    <input required type="text" onfocus="(this.type='date')" onblur="(this.type='text')" tabindex="1" class="mr-4 form-control form-control" id="dataAtend" name="dataAtend" placeholder="Agendar para *">

                                    <script>
                                        var today = new Date();
                                        var dd = today.getDate();
                                        var mm = today.getMonth() + 1;
                                        var yyyy = today.getFullYear();
                                        if (dd < 10) {
                                            dd = '0' + dd
                                        }
                                        if (mm < 10) {
                                            mm = '0' + mm
                                        }

                                        today = yyyy + '-' + mm + '-' + dd;
                                        document.getElementById("dataAtend").setAttribute("min", today);
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" style="text-align: center">
                                <div class="card-body">
                                    <input required type="text" onfocus="(this.type='time')" onblur="(this.type='text')" tabindex="1" class="mr-4 form-control form-control" id="horaAtend" name="horaAtend" placeholder="Hora *" min="07:00" max="22:00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card" style="text-align: center">
                                <div class="card-body">
                                    <button type="submit" class="mr-3 btn btn-primary">Agendar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </section>

    <?php
    include_once './assets/footer.php';
    ?>
</div>
<?php
include_once './assets/jsfile.php';
?>