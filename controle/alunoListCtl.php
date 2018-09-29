<?php
require '../gdee/modelo/DAO/GenericDAO.php';
class alunoListCtl extends controller{

	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('alunoList');
		}
	}

	public function listarAlunos(){
		session_start();
		if(isset($_SESSION['search'])){
			$_SESSION['search'] = '';
		}
		
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		if (isset($_POST['search'])) {
			$search = $_POST['search'];
			$_SESSION['search'] = $search;
			$DAO->query("SELECT a.id, a.nome, a.imagem FROM aluno a WHERE a.nome ='".$search."'");
			$DAO2->query("SELECT a.nome, a.id,  a.imagem FROM aluno a WHERE a.nome = '".$search."' ORDER BY a.id LIMIT 5");
		}else{
			$DAO->query("SELECT a.id, a.nome, a.imagem FROM aluno a ");
			$DAO2->query("SELECT a.nome, a.id, a.imagem FROM aluno a ORDER BY a.id LIMIT 5");
		}
		$DAO->result();
		$count = $DAO->numRows();
		$_SESSION['eventos'] = $DAO2->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../alunoList");
		
	}

	public function limite(){
		session_start();
		$DAO = new GenericDAO();
		$url = $_POST['page'];
		$mody = ($url*5)-5;
		echo $_SESSION['search'];
		if ($_SESSION['search'] != '' ){
			$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a WHERE a.nome = '".$_SESSION['search']."' ORDER BY a.id LIMIT 5 OFFSET ".$mody);
		}else{
			$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a ORDER BY a.id LIMIT 5 OFFSET ".$mody);
		}
		$_SESSION['eventos'] = $DAO->result();
		$_SESSION['paginaAtual'] = $url;
		header("location: ../alunoList");
	}
	public function previewNext(){
		session_start();
		$DAO = new GenericDAO();
		while($i < $_SESSION['numero']){
			$i++;
		}
		
		if(isset($_POST['next']) && $_POST['next'] <= $i){
			$url = $_POST['next'];
			$mody = ($url*5)-5;
			
			if ($_SESSION['search'] != ''){
				$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a WHERE a.nome = '".$_SESSION['search']."' ORDER BY a.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a ORDER BY a.id LIMIT 5 OFFSET ".$mody);
			}
			
			$_SESSION['eventos'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
			header("location: ../alunoList");
		}else{
			header("location: ../alunoList");
		}
		if (isset($_POST['preview']) && $_POST['preview'] > 0) {
			$url = $_POST['preview'];
			$mody = ($url*5)-5;
			if ($_SESSION['search'] != ''){
				$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a WHERE a.nome = '".$_SESSION['search']."' ORDER BY a.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT a.nome, a.id, a.imagem FROM aluno a ORDER BY a.id LIMIT 5 OFFSET ".$mody);
			}
			$_SESSION['eventos'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
		}else{
			header("location: ../alunoList");
		}
	}

}