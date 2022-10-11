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
                <li class="breadcrumb-item active">Editar Cadastro </li>
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
                                // echo $dados['id'] . ' - ' . $dados['nome'] . ' - ' . $dados['nascimento'] . ' - ' . $dados['sexo'] . ' - ' . $dados['cpfrg'] . ' - ' . $dados['telefone'] . ' - ' . $dados['email'] . ' - ' . $dados['procedencia'] . ' - ' . $dados['endereco'] . ' - ' . $dados['bairro'] . ' - ' . $dados['cidade'] . ' - ' . $dados['estado'] . ' - ' . $dados['outrasInfo'] . "<br>";
                            ?>
                                <form action="atualizar.php?id_pac=<?php echo ($dados['id_pac']) ?>" method="POST">
                                    <div class="row">
                                        <input required type="hidden" tabindex="1" class="mr-3 form-control" id="id_pac" name="id_pac" placeholder="Nome Completo *" value="<?php echo ($dados['id_pac']) ?>">

                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input required type="text" tabindex="1" class="mr-3 form-control" id="nome_pac" name="nome_pac" placeholder="Nome Completo *" value="<?php echo ($dados['nome_pac']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>CPF/CNPJ</label>
                                                <input type="text" tabindex="2" maxlength="11" class="mr-3 form-control" id="cpfrg" name="cpfrg" placeholder="CPF ou RG *" value="<?php echo ($dados['cpfrg']) ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                            <label>Procedência</label>
                                                <datalist id="procedencia">
                                                    <option value="Demanda Espontânea">
                                                    <option value="Escola">
                                                    <option value="Justiça">
                                                    <option value="Psiquiatra">
                                                    <option value="Unidade de Saúde">
                                                </datalist>
                                                <input placeholder="Procedência" type="text" list="procedencia" tabindex="3" class="mr-3 form-control" id="procedencia" name="procedencia" value="<?php echo ($dados['procedencia']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                            <label>Cidade</label>
                                                <input required type="text" tabindex="4" class="mr-3 form-control" id="cidade" name="cidade" placeholder="Cidade *" value="<?php echo ($dados['cidade']) ?>">
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <!--  -->
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Nascimento</label>
                                                <input required type="text" onfocus="(this.type='date')" onblur="(this.type='text')" tabindex="1" class="mr-3 form-control form-control" id="nascimento" name="nascimento" placeholder="Data de Nascimento *" value="<?php echo ($dados['nascimento']) ?>" />
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
                                                    document.getElementById("nascimento").setAttribute("max", today);
                                                </script>

                                            </div>
                                            <br>
                                            <div class="form-group">
                                            <label>Telefone</label>
                                                <input type="text" tabindex="2" maxlength="28" class="mr-3 form-control" id="telefone" name="telefone" placeholder="Telefone/WhatsApp - (00) 00000-0000" value="<?php echo ($dados['telefone']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                    <label>Bairro</label>
                                                        <input required type="text" tabindex="3" class="mr-3 form-control" id="bairro" name="bairro" placeholder="Bairro *" value="<?php echo ($dados['bairro']) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                            <label>Estado</label>
                                            <input required tabindex="4" class="mr-3 form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo ($dados['estado']) ?>">
                                            </div>
                                            <br>
                                        </div>
                                        <!--  -->
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Sexo</label>
                                                <input required tabindex="1" class="mr-3 form-control" id="sexo" name="sexo" value="<?php echo ($dados['sexo']) ?>">
                                                <!-- <option value="" disabled selected>Sexo *</option>
                                                    <option value="feminino">Feminino</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="naoidentificar">Não Identificar</option> -->
                                                <!-- </select> -->
                                            </div>
                                            <br>
                                            <div class="form-group">
                                            <label>E-mail</label>
                                                <input type="text" tabindex="2" class="mr-3 form-control" id="email" name="email" placeholder="E-mail" value="<?php echo ($dados['email']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                            <label>Endereço</label>
                                                <input required type="text" tabindex="3" class="mr-3 form-control" id="endereco" name="endereco" placeholder="Endereço *" value="<?php echo ($dados['endereco']) ?>" />
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label>Outras informações</label>
                                                    <input type="text" tabindex="5" class="mr-3 form-control" id="outrasInfo" name="outrasInfo" placeholder="Outras Informações" value="<?php echo ($dados['outrasInfo']) ?>" />
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <button type="submit" class="mr-3 btn btn-primary">Editar</button>
                                </form>

                            <?php
                            } 
                            ?>

                            <?php
                            $lnk1 = mysqli_connect('localhost', 'root', '', 'projetopsichus');
                            $id_pac = $_POST["id_pac"];
                            $nome_pac = $_POST["nome_pac"];
                            $nascimento = $_POST['nascimento'];
                            $sexo = $_POST['sexo'];
                            $cpfrg = $_POST['cpfrg'];
                            $telefone = $_POST['telefone'];
                            $email = $_POST['email'];
                            $procedencia = $_POST['procedencia'];
                            $endereco = $_POST['endereco'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $estado = $_POST['estado'];
                            $outrasInfo = $_POST['outrasInfo'];

                            $update = mysqli_query($lnk, "UPDATE cadastro 
        SET nome_pac = '$nome_pac', nascimento = '$nascimento', sexo = '$sexo', cpfrg = '$cpfrg', telefone = '$telefone', email = '$email', procedencia = '$procedencia', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', outrasInfo = '$outrasInfo' 
        WHERE id_pac = $id_pac");
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
<!-- JavaScript files-->
<?php
include_once './assets/jsfile.php';
?>