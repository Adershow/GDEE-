<?php
require '../gdee/modelo/DAO/GenericDAO.php';
class materiaListCtl extends controller{
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}if(($_SESSION['tipo'] == "professor") and (isset($_SESSION['adm']))){
			$logado = $_SESSION['login'];
			$DAO = new GenericDAO();
			if (isset($_POST['search'])) {
				$search = $_POST['search'];
				$DAO->query("SELECT * FROM materia WHERE nome ='".$search."'");
				$_SESSION['materias'] = $DAO->result();
			}else{
				$DAO->query("SELECT * FROM materia");
				$_SESSION['materias'] = $DAO->result(); 
			}
			$this->loadView('materiaList');
		}else{
			$this->loadView('/');
		}
	}

	public function excluir(){
		$DAO = new GenericDAO();
		$id = $_POST['id'];
		$DAO->remove("materia", $id);
		header("location: ../materiaList");
	}
}
