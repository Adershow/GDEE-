
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
                              <th scope="row">Correr</th>
                              <td><?php echo $atividade['nome']; ?></td>
                              <td><?php echo date('d/m/Y',  strtotime($atividade['data_inicial'])); ?></td>
                              <td><?php echo date('d/m/Y',  strtotime($ev['data_final'])); ?></td>
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
    <a href="#"><button class="btn btn-success">Adicionar Atividades</button></a><span><a href="#"><button class="btn btn-primary">Adicionar Alunos</button></a ></span><span><a href="#"><button class="btn btn-info">Ver alunos já inscritos</button></a></span>
</div>
<?php include 'footer.php';?>
</body>

</html>