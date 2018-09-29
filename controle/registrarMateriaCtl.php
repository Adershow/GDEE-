<?php
require '../gdee/modelo/DAO/GenericDAO.php';
require '../gdee/modelo/Aluno.php';
class registrarMateriaCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}if(($_SESSION['tipo'] == "professor") and (isset($_SESSION['adm']))){
			$logado = $_SESSION['login'];
			$this->loadView('registrarMateria');
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Você não tem autorização para acessar esta area');window.location.href='../gdee';</script>";
		}	
	}

	public function registrarMat(){
		$DAO = new GenericDAO();
		$materia = new Materia();
		$materia->setNome($_POST['nome']);

		$DAO->insert("materia", array(
			"nome" => $materia->getNome(),
		));
		header("location: ../materiaList");
	}
}