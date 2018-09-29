  <?php
  error_reporting(0);
  ini_set(“display_errors”, 0 );
  ?>

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
        <form class="form-inline md-form mr-auto mb-4" action="professorList/listarProfessores" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" style="width: 50%;
            margin-left: 20%;">
            <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit" style="background-color: #3F51B5;">Search</button>
        </form>

        <form action="professorList/filtro" method="post">
            <div class="form-group"style="width: 50%;
            margin-left: 20%;">
            <select class="form-control" name="selecionarMateria" style="width: 50%;
            margin-left: 20%;">
            <?php foreach ($_SESSION['materias'] as $mat) {?>
                <option value="<?php echo $mat['nome']; ?>"><?php echo $mat['nome']; ?></option>
            <?php } ?>
        </select>
        </div><button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit" style="background-color: #3F51B5;
        margin-left: 30%;
        ">Filtrar</button></form>

        <div class="card-deck" style="margin-left: 2%;
        margin-right: 2%;
        margin-top: 20px;">
        <?php 
        foreach($_SESSION['professores'] as $ev){?>

            <div class="card  mb-4" style="min-width: 300px;
            max-width: 400px ;">

            <div class="view overlay">

                <img class="card-img-top" src="../gdee/controle/arquivos/<?php echo $ev['imagem'];?>" alt="Card image cap" style=" max-height: 322px;
                border-radius: 20px;
                max-width: 300px;
                margin: auto;
                min-height: 322px;
                min-width: 300px;
                ">
                <a href="#">
                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                </a>
            </div>

            <div class="card-body">

                <h4 class="card-title"><?php echo $ev['nome']; ?></h4>

                <p class="card-text"><?php echo str_replace(',' , ', ', $ev['nomes']); ?></p>

                <form action="areaInterna/listarDados" method="post">

                    <button type="submit" name="professor" value="<?php echo $ev['id'];?>" class="btn btn-primary" style="margin: auto;" >Acessar</button>
                </form>
            </div>

        </div>

    <?php }?>

</div>

<nav aria-label="pagination example">
    <ul class="pagination pagination-lg justify-content-center">

        <!--Arrow left-->
        <li class="page-item">
            <?php
            if(isset($_SESSION['paginaAtual']) && $_SESSION['paginaAtual'] != 1){
                $page_back = $_SESSION['paginaAtual'] - 1;
            }else{
                $_SESSION['paginaAtual'] = 1;
                $page_back = $_SESSION['paginaAtual'] - 1;
            }
            ?>
            <form action="professorList/previewNext" method="post">
                <button type="submit" name="preview" value="<?php echo $page_back;?>" style=" background-color: white;" class="page-link" aria-label="Next">&laquo;</button>
                <span class="sr-only">Previous</span>
            </form>
        </li>

        <!--Numbers-->
        <?php while($i < $_SESSION['numero']) { $i++;?>
            <form action="professorList/limite" method="post">
                <input type="hidden" name="page" value="<?php echo $i; ?>">
                <input type="submit" style="border-width: 1px; background-color: white; margin-top: 10px; margin-right: 5px;" value="<?php echo $i; ?>" class="page-item">
            </form>
        <?php }?>
        <!--Arrow right-->
        <li class="page-item">
            <?php
            if(isset($_SESSION['paginaAtual'])){
                $page_go = $_SESSION['paginaAtual'] + 1;
            }else{
                $_SESSION['paginaAtual'] = 1;
                $page_go = $_SESSION['paginaAtual'] + 1;
            }
            ?>
            <form action="professorList/previewNext" method="post">
                <button type="submit" name="next" value="<?php echo $page_go;?>" style=" background-color: white;" class="page-link" aria-label="Next">&raquo;</button>
                <span class="sr-only">Next</span>
            </a>
        </form>
    </li>
</ul>
</nav>
<!-- jQuery-2.2.4 js -->
<?php include 'footer.php';?>

</html>