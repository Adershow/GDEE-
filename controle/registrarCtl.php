<?php 

require '../gdee/modelo/DAO/GenericDAO.php';
require '../gdee/modelo/Aluno.php';
class registrarCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}if($_SESSION['tipo'] == "professor"){
			$logado = $_SESSION['login'];
			$this->loadView('registrar');
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Você não tem autorização para acessar esta area');window.location.href='../logar';</script>";
		}	
	}

	public function verificaEmail($email){
		$DAO = new GenericDAO();
		$usuario = new Aluno();
		$DAO->query("SELECT * FROM aluno WHERE email = '".$email."'"); 
		if(sizeof($DAO->result()) == 0){
			return true;
		}else{
			return false;
		}
	}
	public function registrarAl(){
		$DAO = new GenericDAO();
		$usuario = new Aluno();
		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setSenha($_POST['senha']);
		$confirmarSenha = $_POST['confirmarSenha'];
		$usuario->setImagem($_FILES['imagem']);
		$imagem = $usuario->getImagem();		
		if($this->verificaEmail('aluno' ,$usuario->getEmail()) == true){
			if($usuario->getSenha() == $confirmarSenha){
				if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
					$extensao = substr($_FILES['imagem']['name'], -4);
					print_r(move_uploaded_file($imagem['tmp_name'], '../gdee/controle/arquivos/'.md5($usuario->getSenha()).$extensao));
					$DAO->insert("aluno", array(
						"nome" => $usuario->getNome(),
						"email" => $usuario->getEmail(),
						"imagem" => md5($usuario->getSenha()).$extensao,
						"senha" => $usuario->getSenha(),
					));
					echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso');window.location.href='../logar';</script>";
					exit;
				}
			}else{
				echo"<script language='javascript' type='text/javascript'>alert('Dados não preenchidos ou senhas não identicas');window.location.href='../registrar';</script>";
				exit;
			}
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Email já existente');window.location.href='../registrar';</script>";
		}

	}
}