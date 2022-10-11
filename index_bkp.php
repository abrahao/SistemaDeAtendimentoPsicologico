<?php
session_start();
if (!$_SESSION['nome']) {
  header('Location: login.php');
  exit();
}
?>



<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <br>
              <section class="dashboard-counts section-padding">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <div class="name"><strong class="text-uppercase">Pacientes Cadastrados</strong><span> .</span>
                          <div class="count-number"> <span></span>

                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "projetopsichus");
                            if (mysqli_connect_errno()) {
                              printf("Connect failed: %s\n", mysqli_connect_error());
                              exit();
                            }

                            // select * from tabe_tratamentos where id_tabe_tratamentos IN (
                            //     SELECT id_tratamentos FROM table_agendamentos where id_agendamento = 2)

                            if ($result = $mysqli->query("
                            SELECT * FROM cadastro WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."'")
                            ) {

                              $row_cnt = $result->num_rows;

                              echo $row_cnt;
                            }

                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-table" aria-hidden="true"></i></i></div>
                        <div class="name"><strong class="text-uppercase">Atendimentos para esta semana&nbsp;</strong><span></span>
                          <div class="count-number">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "projetopsichus");
                            if (mysqli_connect_errno()) {
                              printf("Connect failed: %s\n", mysqli_connect_error());
                              exit();
                            }

                            if ($result = $mysqli->query("SELECT * FROM agendamento WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."'")) {
                              $row_cnt = $result->num_rows;

                              echo $row_cnt;
                            }

                            ?></div>
                        </div>
                      </div>
                    </div>
                    &nbsp;
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        <div class="name"><strong class="text-uppercase">Aniversariantes do mês&nbsp;</strong><span></span>
                          <div class="count-number">0</div>
                        </div>
                      </div>
                    </div>

                    &nbsp;
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-check-square-o" aria-hidden="true"></i></i></div>
                        <div class="name"><strong class="text-uppercase">Atendimentos realizados&nbsp;</strong><span></span>
                          <div class="count-number">
                            <?php
                            $mysqli = new mysqli("localhost", "root", "", "projetopsichus");
                            if (mysqli_connect_errno()) {
                              printf("Connect failed: %s\n", mysqli_connect_error());
                              exit();
                            }

                            if ($result = $mysqli->query("SELECT * FROM atendimento WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."'")) {
                              $row_cnt = $result->num_rows;
                              echo $row_cnt;
                            }

                            ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    &nbsp;
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
                        <div class="name"><strong class="text-uppercase">Próximo Atendimento&nbsp;</strong><span></span>
                          <div class="count-number">
                            0
                            <!-- <?php
                            $mysqli = new mysqli("localhost", "root", "", "projetopsichus");
                            if (mysqli_connect_errno()) {
                              printf("Connect failed: %s\n", mysqli_connect_error());
                              exit();
                            }

                            if ($result = $mysqli->query("SELECT * FROM atendimento WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."'")) {
                              $row_cnt = $result->num_rows;
                              echo $row_cnt;
                            }

                            ?> -->
                          </div>
                        </div>
                      </div>
                    </div>

                    &nbsp;
                    <div class="col-xl-5 col-md-4 col-5">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="fa fa-window-close" aria-hidden="true"></i></div>
                        <div class="name"><strong class="text-uppercase">Atendimentos não Realizados&nbsp;</strong><span></span>
                          <div class="count-number">
                            0
                            <!-- <?php
                            $mysqli = new mysqli("localhost", "root", "", "projetopsichus");
                            if (mysqli_connect_errno()) {
                              printf("Connect failed: %s\n", mysqli_connect_error());
                              exit();
                            }

                            if ($result = $mysqli->query("SELECT * FROM atendimento WHERE id_cad_psic ='". $_SESSION['id_cad_psic']."'")) {
                              $row_cnt = $result->num_rows;
                              echo $row_cnt;
                            }

                            ?> -->
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </section>

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