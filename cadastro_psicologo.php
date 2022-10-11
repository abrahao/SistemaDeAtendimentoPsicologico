<?php
session_start();
ob_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include_once './assets/head.php';

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO cadastro_psicologo (nome, email, usuario, senha, sexo, cpfrg, crp, telefone, nascimento, cidade, estado) VALUES (
					'" .$dados['nome']. "', 
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "',
                    '" .$dados['sexo']. "',
                    '" .$dados['cpfrg']. "',
                    '" .$dados['crp']. "',
                    '" .$dados['telefone']. "',
                    '" .$dados['nascimento']. "',
                    '" .$dados['cidade']. "',
                    '" .$dados['estado']. "'
					)";

	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>

<body>
    <div>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div>
                        <a href="#">
                            <div class="brand-text d-none d-md-inline-block"><span>Sistema de Gerenciamento de </span><strong class="text-primary"> Atendimento Psicológico</strong></div>
                        </a>
                    </div>
                    <ul>
                        <li class="nav-item"><a href="login.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="breadcrumb-holder">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="login.php">Login</a></li>
                    <li class="breadcrumb-item active">Cadastrar Psicólogo</li>
                </ul>
            </div>
        </div>
        <section class="forms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" tabindex="1" class="mr-3 form-control" id="nome" name="nome" placeholder="Nome Completo *">
                                                
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" tabindex="2" maxlength="11" class="mr-3 form-control" id="cpfrg" name="cpfrg" placeholder="CPF ou RG *">
                                                
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <input required placeholder="CRP *" type="text" tabindex="3" class="mr-3 form-control" id="crp" name="crp" />
                                                
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" tabindex="4" class="mr-3 form-control" id="cidade" name="cidade" placeholder="Cidade *">
                                                
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" tabindex="6" class="mr-3 form-control" id="usuario" name="usuario" placeholder="Login de acesso *">
                                                
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <!--  -->
                                        <div class="col">
                                            <div class="form-group">
                                                <input required type="text" onfocus="(this.type='date')" onblur="(this.type='text')" tabindex="1" class="mr-3 form-control form-control" id="nascimento" name="nascimento" placeholder="Data de Nascimento *">
               
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
                                                <input type="text" tabindex="2" maxlength="28" class="mr-3 form-control" id="telefone" name="telefone" placeholder="Telefone/WhatsApp - (00) 00000-0000">
                                                
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <select tabindex="4" class="mr-3 form-control" id="estado" name="estado">
                                                    <option value="" disabled selected>Estado *</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AM</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SP">SP</option>
                                                    <option value="SE">SE</option>
                                                    <option value="TO">TO</option>
                                                </select>

                                                
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="password" tabindex="6" class="mr-3 form-control" id="senha" name="senha" placeholder="Senha de acesso *">
                                                
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                        <!--  -->
                                        <div class="col">
                                            <div class="form-group">

                                                <select tabindex="1" class="mr-3 form-control" id="sexo" name="sexo">
                                                    <option value="" disabled selected>Sexo *</option>
                                                    <option value="feminino">Feminino</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="naoidentificar">Não Identificar</option>
                                                </select>
                                                

                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" tabindex="2" class="mr-3 form-control" id="email" name="email" placeholder="E-mail *" required>
                                                
                                            </div>
<!--                                             
                                            <br>
                                            <div class="form-group">
                                                
                                                <div class="form-group">
                                                    <input type="password" required tabindex="7" class="mr-3 form-control" id="senha" name="senha" placeholder="Repita a senha de acesso *">
                                                    
                                                </div>
                                            </div>
                                            <br> -->
                                        </div>
                                    </div>
                                    <p>* Campos Obrigatórios</p>
                                    <input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>
                                </form>
                                <br>
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
</body>