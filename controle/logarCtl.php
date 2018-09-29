<?php
class logarCtl extends controller{
	private $DAO;

	public function index(){
		$this->loadView('login');
	}
	public function login(){
		session_start();
		require '../gdee/modelo/DAO/GenericDAO.php';
		$login = $_POST["nome"];
		$senha = $_POST["senha"];
		$tipo = $_POST["tipo"];
		if(isset($tipo)){
			$_SESSION['tipo'] = $tipo;
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM ".$tipo." WHERE email = '".$login."' AND senha = '".$senha."'");
			if (sizeof($DAO->result()) > 0) {
				$_SESSION['email'] = $login;
				$_SESSION['senha'] = $senha;
				foreach ($DAO->result() as $usu) {
					if ($usu['adm'] == 1) {
						header('location:../');
						$_SESSION['imagem'] = $usu['imagem'];
						$_SESSION['email'] = $usu['email'];
						$_SESSION['adm'] = $usu['adm'];
						$_SESSION['login'] = $usu['nome'];
						$_SESSION['id'] = $usu['id'];
					}else{
						header('location:../');
						$_SESSION['id'] = $usu['id'];
						$_SESSION['imagem'] = $usu['imagem'];
						$_SESSION['login'] = $usu['nome'];
					}
				}
			}else{
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../logar';</script>";
				exit();
			}
		}else{
			header("location: ../logar");
		}
	}
	public function deslogar(){
		session_start();
		session_destroy();
		header("location: ../");
	}
}

?>