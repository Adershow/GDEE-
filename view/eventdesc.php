
<body>
  <!-- ##### Preloader ##### -->
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

  </header>

  <div class="about-us-area about-page section-padding-100">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-12 col-lg-5">
          <div class="about-content">
            <?php foreach ($_SESSION['dados3'] as $ev) { ?>
              <h2><?php echo $ev['nome']; ?></h2>
              <p><?php echo $ev['descricao']; ?></p>
              <div class="opening-hours-location mt-30 d-flex align-items-center">
                <!-- Opening Hours -->
                <div class="opening-hours">
                  <h6><i class="fa fa-clock-o"></i> Data Inicial</h6>
                  <p><?php echo date('d/m/Y',  strtotime($ev['data_inicial'])); ?></p>
                </div>
                <div class="opening-hours">
                  <h6><i class="fa fa-clock-o"></i> Data Final</h6>
                  <p><?php echo date('d/m/Y',  strtotime($ev['data_final'])); ?></p>
                </div>
                <br/>
              </div>
            <?php } ?>
            <br/>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Data inicial</th>
                  <th scope="col">Data final</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($_SESSION['atividade'] as $atividade) {?>
                  <tr>
                    <td><?php echo $atividade['nome']; ?></td>
                    <td><?php echo date('d/m/Y',  strtotime($atividade['data_inicial'])); ?></td>
                    <td><?php echo date('d/m/Y',  strtotime($atividade['data_final'])); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php foreach ($_SESSION['dados3'] as $ev) { ?>
          <div class="col-12 col-lg-6">
            <div class="about-thumbnail">
              <img src="../gdee/controle/arquivos/<?php echo  $ev['imagem'];?>" style="max-width: 500px;
              max-height: 700px;
              border-radius: 100px;" alt="">
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div>
    <a href="#" data-toggle="modal" data-target="#modalLRFormAtividade"><button class="btn btn-success">Adicionar Atividades</button></a>
    <span>
      <a data-toggle="modal" data-target="#modalLRFormAlunos" href="#"><button class="btn btn-primary">Adicionar Alunos</button></a >
    </span>
    <span>
      <a data-toggle="modal" data-target="#modalLRFormVerAlunos" href="#"><button class="btn btn-info">Ver alunos já inscritos</button></a>
    </span>
  </div>
</div>

<div class="modal fade" id="modalLRFormAtividade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <form action="eventdesc/registrarAtiv" method="post">
                <div class="md-form mt-3">
                  <input type="text" id="materialSubscriptionFormPasswords" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                <br/>
                <!-- E-mai -->
                <div class="md-form">
                  <input type="text" id="materialSubscriptionFormEmail" name="descricao" class="form-control" placeholder="Descrição" required>
                </div>


                <div class="md-form">
                  Data inicial:<input type="date" id="materialSubscriptionFormEmail" name="data_inicial" class="form-control" required>
                </div>

                <div class="md-form">
                  Data final:<input type="date" id="materialSubscriptionFormEmail" name="data_final" class="form-control">
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
  <!--/.Content-->
</div>
</div>


<!-- addalunos -->
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
              <form action="eventdesc/registrarAl" method="post">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Email</th>
                      <th scope="col">Adicionar</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($_SESSION['alunoId'] as $aluno){ ?>
                      
                    <tr>
                      <th scope="row"><?php echo $aluno['nome']; ?></th>
                      <td><?php echo $aluno['email']; ?></td>
                      <td><input type="checkbox" value="<?php echo $aluno['id']; ?>" name="aluno[]"></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>

                <div class="text-center mt-2">
                  <button class="btn btn-info">Adicionar <i class="fa fa-sign-in ml-1"></i></button>
                </div>
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
    <!--/.Content-->
  </div>
</div>

<!-- veralunos -->
<div class="modal fade" id="modalLRFormVerAlunos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <form action="#" method="post">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($_SESSION['alunoList'] as $aluno){ ?>
                    <tr>
                      <th scope="row"><?php echo $aluno['nome']; ?></th>
                      <td><?php echo $aluno['email']; ?></td>
                      <td></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
    <!--/.Content-->
  </div>
</div>
<?php include 'footer.php';?>
</body>

</html>