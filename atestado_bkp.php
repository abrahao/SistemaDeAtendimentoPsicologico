<?php
session_start();
if (!$_SESSION['nome']) {
  header('Location: login.php');
  exit();
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
        <li class="breadcrumb-item active">Documentos</li>
        <li class="breadcrumb-item active">Atestado</li>
      </ul>
    </div>
  </div>
  <section class="forms">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body" id="print">
              <br>

              <div class="form-group">
              <div id="print" class="conteudo">
                <textarea required type="text" tabindex="2" rows="15" cols="100" class="mr-3 form-control <?= $erros['notaAtend'] ? 'is-invalid' : '' ?>" id="notaAtend" name="notaAtend" placeholder="Notas de atendimento *" value="<?= $dados['notaAtend'] ?>"></textarea> 
                  <div class="invalid-feedback">
                    <?= $erros['#'] ?>
                  </div>
              </div>
            </div>  
            <script>
                  function imprimir(){
                  var conteudo = document.getElementById('print').innerHTML;
                  tela_impressao = window.open('about:blank');
                  tela_impressao.document.write(conteudo);
                  tela_impressao.window.print();
                  tela_impressao.window.close();
                  }
              </script>
              <!-- <div id="print" class="conteudo">
              <h1 style="text-align:center">ATESTADO PSICOLOGICO</h1><br><br>
              <p style="text-align:center">Atesto para os devidos fins que xxxx RG 000 residente e domiciliado a ________ esteve sob <br>
                tratamento psicologico neste consultorio,
                no periodo das ________ as ________ horas do dia __/__/__ <br>
                necessitando o mesmo de ________ dias de convalescência. <br>
                _________, __/__/__ 
                <br><br><br><br><br><br>

                Assinatura do paciente &nbsp;&nbsp; &nbsp;&nbsp; Assinatura do psicologo
                <br>
                <br>

                <script>
                  function imprimir(){
                  var conteudo = document.getElementById('print').innerHTML;
                  tela_impressao = window.open('about:blank');
                  tela_impressao.document.write(conteudo);
                  tela_impressao.window.print();
                  tela_impressao.window.close();
                  }
              </script> -->
              <input type="button" onclick="imprimir();" value="Imprimir">
              </div>
              </p>
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