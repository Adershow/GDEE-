<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>../gdee - Gerenciamento de eventos escolares </title>

    <!-- Favicon -->
    <link rel="icon" href="../gdee/assets/template/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../gdee/assets/template/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../gdee/assets/MDB/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../gdee/assets/MDB/css/mdb.min.css" rel="stylesheet">

</head>
<body>
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Top Header Meta -->
                    <!-- Top Header Meta -->
                    <div class="top-header-meta">
                        <a href="mailto:info.deercreative@gmail.com" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Email: <?php echo $_SESSION['email']; ?></span></a>
                        <a href="#" class="phone"></i> <span>Nome: <?php echo $_SESSION['login']; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="classy-navbar justify-content-between" id="croseNav">
    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">

        <!-- close btn -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Nav Start -->
        <div class="classynav">
            <ul>
                <li><a href="../gdee">Inicio</a></li>
                <li><a >Registrar</a>
                    <ul class="dropdown">
                        <li><a href="registrar">Aluno</a></li>
                        <li><a href="registrarP">Professor</a></li>
                        <li><a href="registrarE">Eventos</a></li>
                        <li><a href="registrarMateria">Materias</a></li>
                    </ul>
                </li>
                <li><a href="#">Ver</a>
                    <ul class="dropdown">
                        <li><a href="../gdee/alunoList/listarAlunos">Alunos</a></li>
                        <li><a href="../gdee/professorList/listarProfessores">Professores</a></li>
                        <li><a href="../gdee/eventosList/listarEventos">Eventos</a></li>
                        <li><a href="../gdee/materiaList">Materias</a></li>
                    </ul>
                </li>
                <li><a href="../gdee/perfil/listarDados">Perfil</a></li>
            </ul>
            <!-- Donate Button -->
            <form action="logar/deslogar" method="post">
                <input type="submit"  style="border-radius: 50px;" class="btn crose-btn header-btn" value="Logout">
            </form>

        </div>
        <!-- Nav End -->
    </div>
</nav>