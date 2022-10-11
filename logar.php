<?php
$lnk = mysqli_connect('localhost', 'root', '', 'projetopsichus');

$login = $_POST['nome'];
$senha = $_POST['senha'];

/* Verifica se existe usuario, o segredo ta aqui quando ele procupa uma 
linha q contenha o login e a senha digitada */
$sql_logar = "SELECT * FROM cadastro_psicologo WHERE user = '$login' && senha = '$senha'";
$exe_logar = mysqli_query($lnk, $sql_logar) or die("Erro");
$fet_logar = mysqli_fetch_assoc($exe_logar);
$num_logar = mysqli_num_rows($exe_logar);


//Verifica se n existe uma linha com o login e a senha digitado
if ($num_logar == 0) {
  echo "Login ou senha invalido.";
  echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para volta.</a>";
} elseif ($fet_logar['activo'] == "N") {
  echo "Usuario não ativado, verifique seu e-mail para ativa a conta.";
  echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para volta.</a>";
} else {
  //Cria a sess�o e manda pra pagina principal.php
  session_start();
  $_SESSION['user'] = $login;
  $_SESSION['senha'] = $senha;
  $_SESSION['id_cad_psic'] = $fet_logar['id_cad_psic'];
  $_SESSION['nome_psic'] = $fet_logar['nome_psic'];
  $_SESSION['crp'] = $fet_logar['crp'];
  header("Location:index.php");
}
