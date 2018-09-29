<?php
require '../gdee/modelo/DAO/GenericDAO.php';
require '../gdee/modelo/Aluno.php';
class registrarPCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}if(($_SESSION['tipo'] == "professor") and (isset($_SESSION['adm']))){
			$logado = $_SESSION['login'];
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM materia");
			$_SESSION["materias"] = $DAO->result();
			$this->loadView('registrarP');
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

	public function registrarProf(){
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		$usuario = new Aluno();
		$usuario->setNome($_POST['nome']);
		$usuario->setEmail($_POST['email']);
		$usuario->setSenha($_POST['senha']);
		$id = $_POST['materia'];
		$confirmarSenha = $_POST['confirmarSenha'];
		$usuario->setImagem($_FILES['imagem']);
		$adm = $_POST['adm'];
		$imagem = $usuario->getImagem();		
		if($this->verificaEmail('professor' ,$usuario->getEmail()) == true){
			if($usuario->getSenha() == $confirmarSenha){
				if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
					$extensao = substr($_FILES['imagem']['name'], -4);
					print_r(move_uploaded_file($imagem['tmp_name'], '../gdee/controle/arquivos/'.md5($usuario->getSenha()).$extensao));
					if(isset($adm)){
						$DAO->insert("professor", array(
							"nome" => $usuario->getNome(),
							"email" => $usuario->getEmail(),
							"imagem" => md5($usuario->getSenha()).$extensao,
							"senha" => $usuario->getSenha(),
							"adm" => "1",
						));
					}else{
						$DAO->insert("professor", array(
							"nome" => $usuario->getNome(),
							"email" => $usuario->getEmail(),
							"imagem" => md5($usuario->getSenha()).$extensao,
							"senha" => $usuario->getSenha(),
							"adm" => "0",
						));
					}
					$DAO->query("Select LAST_INSERT_ID()");
					$last_id = $DAO->result();
					print_r($id);
					foreach ($last_id as $dado) {
						foreach ($id as $dadoId) {
							$DAO2->insert("professor_has_materia", array(
								"Professor_id" => $dado['LAST_INSERT_ID()'],
								"Materia_id" => $dadoId,
							));
						}
					}
					echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso');window.location.href='../eventosList/listarEventos';</script>";
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