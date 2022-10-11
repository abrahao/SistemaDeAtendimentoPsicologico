<!DOCTYPE html>
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
        <li class="breadcrumb-item active">Parecer</li>
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

              <html>

              <head>
                <script src="./tinymce/js/tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                  tinymce.init({
                    selector: "textarea",
                    menubar: false,
                    plugins: 'print',
                    menubar: '',
                    icons: 'material',
                    font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                    fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt',
                    toolbar: "print bold italic underline fontselect fontsizeselect alignleft aligncenter alignright alignjustify"

                  });
                </script>
              </head>

              <button type="button" onclick="window.close()" class="btn btn-info">Voltar ao Antendimento</button>
              <button type="button" class="btn btn-info">Histórico de Pareceres</button>

              <body>
                <h4>Parecer Psicológico</h4>
                <form method="post">
                <textarea id="mytextarea" style="resize: vertical" rows="18">
                   <h4 style="text-align:center;">PARECER PSICOLOGICO</h4> <br>

                   <p>
                     1 - IDENTIFICACAO
                   </p>
                   <p>
                     2 - DESCRIÇÃO DA DEMANDA
                   </p>
                   <p>
                     3 - ANÁLISE
                   </p>
                   <p>
                     4 - CONCLUSÃO
                   </p>

                   <h5 style="text-align:center;">
                   Psicólogo <?= $_SESSION['nome_psic'] ?><br>
                    CRP nº <?= $_SESSION['crp'] ?>
                   </h5>
                   </textarea>
                   <button type="submit" class="mr-3 btn btn-primary" name="cadClient">Salvar</button>

              </form>
              </body>

              </html>

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