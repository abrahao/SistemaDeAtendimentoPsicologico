<?php
session_start();
if (!$_SESSION['nome']) {
  header('Location: login.php');
  exit();
}
?>
<style>
  #notify {
    color: black;
    position: relative;
  }

  #notify:hover {
    top: -2px;
    box-shadow: 0 2px 3px #667
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
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
      </ul>
    </div>
  </div>
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <a href="notify.php">
              <div class="card-body" id="notify">
                <h5 class="card-title">Notificações do sitema</h5>
                <span style="color: green;">
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
                
                $sql = "SELECT * FROM sistema WHERE id ='" . $_SESSION['id'] . "'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                    $row_cnt = $result->num_rows;
                    echo $row_cnt;
                } else {
                  echo "Sem notificações";
                }
                $conn->close();
                ?>
                </span>
              </div>
          </div>
          </a>
        </div>

        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <div class="card-body">
              <h5 class="card-title">Pacientes cadastrados</h5>
              <span style="color: green;">
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
                
                $sql = "SELECT * FROM cadastro WHERE id ='" . $_SESSION['id'] . "'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                    $row_cnt = $result->num_rows;
                    echo $row_cnt;
                } else {
                  echo "Você não tem pacientes cadastrados";
                }
                $conn->close();
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <div class="card-body">
              <h5 class="card-title">Próximo atendimento</h5>
              <span style="color: green;">0</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <div class="card-body">
              <h5 class="card-title">Atendimentos para esta semana</h5>
              <span style="color: green;">
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
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                    $row_cnt = $result->num_rows;
                    echo $row_cnt;
                } else {
                  echo "Você não tem pacientes agendados";
                }
                $conn->close();
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <div class="card-body">
              <h5 class="card-title">Atendimentos realizados</h5>
              <span style="color: green;">
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
                
                $sql = "SELECT * FROM atendimento WHERE id ='" . $_SESSION['id'] . "'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                    $row_cnt = $result->num_rows;
                    echo $row_cnt;
                } else {
                  echo "Você não tem pacientes cadastrados";
                }
                $conn->close();
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card" style="text-align: center">
            <div class="card-body">
              <h5 class="card-title">Atendimentos não realizados</h5>
              <span style="color: green;">
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
                
                $sql = "SELECT * FROM naoatend WHERE id ='" . $_SESSION['id'] . "'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                    $row_cnt = $result->num_rows;
                    echo $row_cnt;
                } else {
                  echo "Todos os pacientes foram atendidos";
                }
                $conn->close();
                ?>
            </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once './assets/footer.php';
  ?>
</div>
<?php
include_once './assets/jsfile.php';
?>