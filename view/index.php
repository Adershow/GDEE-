
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
        <!-- ***** Navbar Area ***** -->

    </header>
    <!-- ##### Header Area End ##### -->

    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Area Start ##### -->
    
    <!-- ##### About Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(../gdee/assets/template/img/grupo.png)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-content text-center">
                        <h6>GDEE</h6>
                        <h2>Gerenciador de eventos escolares</h2>
                        <a href="../gdee/eventosList/listarEventos" class="btn crose-btn btn-2">Eventos</a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <div class="card-body card-body-cascade text-center">

        <!-- Title -->
        <h4 class="card-title"><strong>Nossa meta</strong></h4>
        <!-- Subtitle -->
        <!-- Text -->
        <p class="card-text">Este site tem o intuito de aproximar alunos e professores, por meio do ensino e entretenimento
        </p>

    </div>
   

<?php include 'footer.php';?>