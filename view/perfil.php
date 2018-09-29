 <div class="preloader d-flex align-items-center justify-content-center">
    <!-- Line -->
    <div class="line-preloader"></div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- ***** Navbar Area ***** -->
    <div class="crose-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <?php include("cabecalho.php"); ?>

            </div>
        </div>

        <!-- ***** Search Form Area ***** -->
        <div class="search-form-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="searchForm">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
                                <button type="submit" class="d-none"></button>
                            </form>
                            <div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Navbar Area ***** -->
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->


<section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(../gdee/assets/template/img/grupo.png)">
    <?php foreach ($_SESSION['dados'] as $dados) {?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-content text-center">
                        <div class="single-team-members text-center mb-100">
                            <img src="../gdee/controle/arquivos/<?php echo $dados['imagem']; ?>" style="max-width: 400px;
                            max-height: 400px;
                            border-radius: 200px;">
                            
                        </div>
                        <br/>
                        <section class="contact-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="contact-content-area">
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <div class="contact-content contact-information">
                                                        <h4>Nome:</h4>
                                                        <p><?php echo $dados['nome']; ?></p>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="contact-content contact-information">
                                                        <h4>Email:</h4>
                                                        <p><?php echo $dados['email']; ?></p>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="contact-content contact-information">
                                                        <h4>Opções</h4>
                                                        <p><a data-toggle="modal" data-target="#modalLRFormAlunos" href="#"><button class="btn btn-primary">Editar</button></a></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalLRFormAlunos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->


        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
            <!--Body-->
            <div class="modal-body mb-1">
                <form action="perfil/editar" method="post"  enctype="multipart/form-data">
                    <div class="md-form mt-3">
                      <input type="text" id="materialSubscriptionFormPasswords" name="nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <br/>
                  <!-- E-mai -->
                  <div class="md-form">
                      <input type="text" id="materialSubscriptionFormEmail" name="email" class="form-control" placeholder="Email" required>
                  </div>

              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="imagem" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="inputGroupFile01">Escolha seu Arquivo</label>
                </div>
            </div>

            <div class="text-center mt-2">
                <button class="btn btn-info">Enviar <i class="fa fa-sign-in ml-1"></i></button>
            </div>
            <br/>
        </form>
    </div>
    <!--Footer-->
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
    </div>         
</div>
</div>
</div>
</div>
<?php } ?>
</section>
<?php include 'footer.php';?>