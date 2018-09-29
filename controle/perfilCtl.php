<?php
require_once '../gdee/modelo/DAO/GenericDAO.php';
class perfilCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('perfil');
		}	
	}
	public function listarDados(){
		session_start();
		$DAO = new GenericDAO();
		$DAO->query("SELECT * FROM ".$_SESSION['tipo']." WHERE ".$_SESSION['tipo'].".id ='".$_SESSION['id']."'");
		$_SESSION['dados'] = $DAO->result();
		header("location: ../perfil");
	}
}
 ?>