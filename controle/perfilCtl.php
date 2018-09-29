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

	public function editar(){
		session_start();
		$DAO = new GenericDAO();
		if($_SESSION['tipo'] == "professor"){
			$professor = new Professor();
			$professor->setNome($_POST['nome']);
			$professor->setEmail($_POST['email']);
			$professor->setImagem($_FILES['imagem']);
			$imagem = $professor->getImagem();
			if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
				$extensao = substr($_FILES['imagem']['name'], -4);
				print_r(move_uploaded_file($imagem['tmp_name'], '../gdee/controle/arquivos/'.md5($professor->getSenha()).$extensao));
				$DAO->query("UPDATE professor SET nome='".$professor->getNome()."', email='".$professor->getEmail()."', imagem = '".md5($professor->getSenha()).$extensao."' WHERE id='".$_SESSION['id']."'");
				$DAO->result();
			}
		}else{
			$aluno = new Aluno();
			$aluno->setNome($_POST['nome']);
			$aluno->setEmail($_POST['email']);
			$aluno->setImagem($_FILES['imagem']);
			$imagem = $aluno->getImagem();
			if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
				$extensao = substr($_FILES['imagem']['name'], -4);
				print_r(move_uploaded_file($imagem['tmp_name'], '../gdee/controle/arquivos/'.md5($aluno->getSenha()).$extensao));
				$DAO->query("UPDATE aluno SET nome='".$aluno->getNome()."', email='".$aluno->getEmail()."', imagem = '".md5($professor->getSenha()).$extensao."' WHERE id='".$_SESSION['id']."'");
				$DAO->result();
			}
		}

		header("location: ../perfil/listarDados");

	}
}
?>