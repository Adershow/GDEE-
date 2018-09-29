<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/MDB/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="assets/MDB/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="card">

        <!--Card content-->
        <div class="card-body px-lg-5">

            <!-- Form -->
            <form class="text-center" action="../gdee/registrarE/registrarEv" style="color: #757575;" method="post" enctype="multipart/form-data">

                <p>Registrar seu Evento</p>

                <!-- Name -->
                <div class="md-form mt-3">
                    <input type="text" id="materialSubscriptionFormPasswords" name="nome" class="form-control" placeholder="Nome">
                </div>
                <!-- E-mai -->
                <div class="md-form">
                    <input type="text" id="materialSubscriptionFormEmail" name="descricao" class="form-control" placeholder="Descrição">
                </div>


                <div class="md-form">
                    Data inicial:<input type="date" id="materialSubscriptionFormEmail" name="datainicial" class="form-control">
                </div>

                <div class="md-form">
                    Data final:<input type="date" id="materialSubscriptionFormEmail" name="datafinal" class="form-control">
                </div>

                <label>Escolha uma ou mais de uma matéria</label>
                <select class="custom-select" name="materia[]" id="basic" multiple="multiple" style="margin-bottom: 10px;
                max-height: 100px;">
                <?php foreach ($_SESSION['materias'] as $mat) {?>
                    <option value="<?php echo $mat['id']; ?>"><?php echo $mat['nome']; ?></option>
                <?php } ?>
            </select>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="imagem" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Escolha seu Arquivo</label>
            </div>
        </div>
        <!-- Sign in button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Registrar</button>

    </form>
    <!-- Form -->

</div>

</div>
<script type="text/javascript" src="assets/MDB/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="assets/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="assets/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="assets/MDB/js/mdb.min.js"></script>
<!-- Material form subscription -->
</body>