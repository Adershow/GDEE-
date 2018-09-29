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

    <form class="form-inline md-form mr-auto mb-4" action="materiaList" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" style="width: 50%;
      margin-left: 20%;">
      <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit" style="background-color: #3F51B5;">Search</button>
    </form>

    <table class="table"  style="max-width: 75%;
    margin: auto;">
      <thead >
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach ($_SESSION['materias'] as $mat) {?>
        <tr>
          <th scope="row"><?php echo $mat['id']; ?></th>
          <td><?php echo $mat['nome']; ?></td>
          <td><form action="materiaList/excluir" method="post"><button type="submit" name="id" value="<?php echo $mat['id']; ?>" class="btn btn-danger">Excluir</button></form></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php include 'footer.php'; ?>