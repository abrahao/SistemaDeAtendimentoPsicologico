<?php
session_start();
if (!$_SESSION['nome']) {
  header('Location: login.php');
  exit();
}
?>

<?php
include_once './assets/head.php';

$btnCadPaciente = filter_input(INPUT_POST, 'btnCadPaciente', FILTER_SANITIZE_STRING);
if ($btnCadPaciente) {
  include_once 'conexao.php';
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //var_dump($dados);

  $result_usuario = "INSERT INTO cadastro (nome_pac, nascimento, sexo, cpfrg, telefone, email, procedencia, endereco, bairro, cidade, estado, outrasInfo, id) VALUES (
					          
                    '" . $dados['nome_pac'] . "',
                    '" . $dados['nascimento'] . "',
                    '" . $dados['sexo'] . "',
                    '" . $dados['cpfrg'] . "',
                    '" . $dados['telefone'] . "',
                    '" . $dados['email'] . "',
                    '" . $dados['procedencia'] . "',
                    '" . $dados['endereco'] . "',
                    '" . $dados['bairro'] . "',
                    '" . $dados['cidade'] . "',
                    '" . $dados['estado'] . "',
                    '" . $dados['outrasInfo'] . "',
                    '" . $dados['id'] = $_SESSION['id'] . "'
					)";

  $resultado_usario = mysqli_query($conn, $result_usuario);
  if (mysqli_insert_id($conn)) {
    $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
    header("Location: index.php");
  } else {
    $_SESSION['msg'] = "Erro ao cadastrar o usuário";
  }
}
?>

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
        <li class="breadcrumb-item active">Cadastrar Paciente</li>
      </ul>
    </div>
  </div>
  <section class="forms">
    <div class="container-fluid">
      <form method="POST" action="">
        <div class="row">
          <div class="col-sm-4">
            <div class="card" style="text-align: center">
              <div class="card-body">
                <span>
                  <div class="form-group">
                    <input type="text" tabindex="1" class="mr-3 form-control" id="nome_pac" name="nome_pac" placeholder="Nome Completo *">
                  </div>

                  <div class="form-group">
                    <input type="text" tabindex="2" maxlength="11" class="mr-3 form-control" id="cpfrg" name="cpfrg" placeholder="CPF ou RG *">
                  </div>

                  <div class="form-group">
                    <datalist id="procedencia">
                      <option value="Demanda Espontânea">
                      <option value="Escola">
                      <option value="Justiça">
                      <option value="Psiquiatra">
                      <option value="Unidade de Saúde">
                    </datalist>
                    <input placeholder="Procedência" type="text" list="procedencia" tabindex="3" class="mr-3 form-control " id="procedencia" name="procedencia">
                  </div>

                  <div class="form-group">
                    <input type="text" tabindex="4" class="mr-3 form-control" id="cidade" name="cidade" placeholder="Cidade *">
                  </div>
                </span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card" style="text-align: center">
              <div class="card-body">
                <span>
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

                  <div class="form-group">
                    <input type="text" tabindex="2" maxlength="28" class="mr-3 form-control" id="telefone" name="telefone" placeholder="Telefone/WhatsApp - (00) 00000-0000">
                  </div>

                  <div class="form-group">
                    <div class="form-group">
                      <div class="form-group">
                        <input type="text" tabindex="3" class="mr-3 form-control" id="bairro" name="bairro" placeholder="Bairro *">

                      </div>
                    </div>
                  </div>

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
                </span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card" style="text-align: center">
              <div class="card-body">
                <span>
                  <div class="form-group">

                    <select tabindex="1" class="mr-3 form-control" id="sexo" name="sexo">
                      <option value="" disabled selected>Sexo *</option>
                      <option value="feminino">Feminino</option>
                      <option value="masculino">Masculino</option>
                      <option value="naoidentificar">Não Identificar</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" tabindex="2" class="mr-3 form-control " id="email" name="email" placeholder="E-mail">
                  </div>

                  <div class="form-group">
                    <input type="text" tabindex="3" class="mr-3 form-control" id="endereco" name="endereco" placeholder="Endereço *">
                  </div>

                  <div class="form-group">
                    <div class="form-group">
                      <input type="text" tabindex="5" class="mr-3 form-control" id="outrasInfo" name="outrasInfo" placeholder="Outras Informações">

                    </div>
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="card" style="text-align: center">
          <div class="card-body">
            <span>
              <input type="submit" name="btnCadPaciente" value="Cadastrar"><br><br> </span>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <span style="color: red;">
              * Dados obrigatórios
            </span>
          </div>
        </div>
      </form>
    </div>
  </section>
  <?php include_once './assets/footer.php';
  ?>
</div>
<?php
include_once './assets/jsfile.php';
?>