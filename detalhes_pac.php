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
                <li class="breadcrumb-item active">Pacientes Cadastrados / Dados do paciente </li>
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
                            $lnk = new mysqli($servidor, $usuario, $senha, $dbname);

                            $id_pac = $_GET['id_pac'];
                            $sql = mysqli_query($lnk, "SELECT * FROM cadastro WHERE id_pac='$id_pac'") or die("Erro");
                            $linhas = mysqli_num_rows($sql);

                            while ($dados = mysqli_fetch_assoc($sql)) {
                            ?>
                                <form action="atualizar.php?id_pac=<?php echo ($dados['id_pac']) ?>" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nome do(a) Paciente </label>
                                                <input disabled type="text" tabindex="1" class="mr-3 form-control" id="nome_pac" name="nome_pac" value="<?php echo ($dados['nome_pac']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>CPF ou RG</label>
                                                <input disabled type="text" tabindex="2" maxlength="11" class="mr-3 form-control" id="cpfrg" name="cpfrg" value="<?php echo ($dados['cpfrg']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Procedência</label>
                                                <input disabled type="text" list="procedencia" tabindex="3" class="mr-3 form-control" id="procedencia" name="procedencia" value="<?php echo ($dados['procedencia']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input disabled type="text" tabindex="4" class="mr-3 form-control" id="cidade" name="cidade" value="<?php echo ($dados['cidade']) ?>">
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <!--  -->
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Data de Nascimento</label>
                                                <input disabled type="text" onfocus="(this.type='date')" onblur="(this.type='text')" tabindex="1" class="mr-3 form-control form-control" id="nascimento" name="nascimento" value="<?php echo ($dados['nascimento']) ?>" />
                                                <script>
                                                    var dataInput = 'nascimento';
                                                    data = new Date(dataInput);
                                                    dataFormatada = data.toLocaleDateString('pt-BR', {
                                                        timeZone: 'UTC'
                                                    });
                                                </script>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Telefone/WhatsApp</label>
                                                <input disabled type="text" tabindex="2" maxlength="28" class="mr-3 form-control" id="telefone" name="telefone" value="<?php echo ($dados['telefone']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input disabled type="text" tabindex="3" class="mr-3 form-control" id="bairro" name="bairro" value="<?php echo ($dados['bairro']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input disabled tabindex="4" class="mr-3 form-control" id="estado" name="estado" value="<?php echo ($dados['estado']) ?>">
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Sexo</label>
                                                <input disabled tabindex="1" class="mr-3 form-control" id="sexo" name="sexo" value="<?php echo ($dados['sexo']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input disabled type="text" tabindex="2" class="mr-3 form-control" id="email" name="email" value="<?php echo ($dados['email']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input disabled type="text" tabindex="3" class="mr-3 form-control" id="endereco" name="endereco" value="<?php echo ($dados['endereco']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Outras Informações</label>
                                                <input disabled type="text" tabindex="5" class="mr-3 form-control" id="outrasInfo" name="outrasInfo" value="<?php echo ($dados['outrasInfo']) ?>" />
                                            </div>
                                            <br>
                                        </div>
                                    </div>
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

    <!--  -->
    <!-- <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <header>
                                <h1 class="h3 display">Últimos Atendimentos </h1>
                                <hr>
                            </header>

                            <?php
                            // $id_atend = $_GET['id_atend'];
                            // $sql2 = mysqli_query($lnk, "SELECT * FROM atendimento WHERE id_atend='$id_atend'") or die("Erro");
                            // $linhas = mysqli_num_rows($sql2);
                            // while ($dados = mysqli_fetch_assoc($sql2)) {

                            ?>

                                <a href="construct_page.php"> <button type="button" class="btn btn-outline-dark">
                                        <?php
                                        //  echo ($dados['dataRegAtend'])
                                        ?>
                                    </button></a>
                            <?php
                            // }
                            ?>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">05/02/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">10/03/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">23/04/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">21/05/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">12/06/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">16/07/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">09/08/2020</button></a>
                            <a href="construct_page.php"><button type="button" class="btn btn-outline-dark">27/09/2020</button></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--  -->

    <?php include_once './assets/footer.php';
    ?>
</div>
<!-- JavaScript files-->
<?php
include_once './assets/jsfile.php';
?>