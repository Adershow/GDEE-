<?php
require_once '../gdee/modelo/DAO/GenericDAO.php';
class areaInternaCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('areaInterna');
		}	
	}
	public function listarDados(){
		session_start();
		$DAO = new GenericDAO();
		if(isset($_POST['professor'])){
			$id = $_POST['professor'];
			$DAO->query("SELECT * FROM professor WHERE professor.id ='".$id."'");
		}if(isset($_POST['aluno'])){
			$id = $_POST['aluno'];
			$DAO->query("SELECT * FROM aluno WHERE aluno.id ='".$id."'");
		}
		$_SESSION['dados2'] = $DAO->result();
		header("location: ../areaInterna");
	}
}
?>