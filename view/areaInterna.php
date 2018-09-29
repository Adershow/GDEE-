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
    <?php foreach ($_SESSION['dados2'] as $dados) {?>
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
    <?php } ?>
</section>
<?php include 'footer.php';?>