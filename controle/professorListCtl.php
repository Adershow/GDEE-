<?php
require '../gdee/modelo/DAO/GenericDAO.php';
class professorListCtl extends controller{

	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM materia");
			$_SESSION['materias'] = $DAO->result(); 
			$this->loadView('professorList');
		}
	}

	public function listarProfessores(){
		session_start();
		if(isset($_SESSION['search'])){
			$_SESSION['search'] = '';
		}
		
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		if (isset($_POST['search'])) {
			$search = $_POST['search'];
			$_SESSION['search'] = $search;
			$DAO->query("SELECT p.id, p.nome,  p.imagem FROM professor p WHERE p.nome ='".$search."'");
			$DAO2->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia em on em.professor_id = p.id INNER JOIN materia m on m.id = em.Materia_id WHERE p.nome = '".$search."' GROUP BY p.id LIMIT 5");
		}else{
			$DAO->query("SELECT p.id, p.nome, p.imagem FROM professor p ");
			$DAO2->query("SELECT p.nome, p.id, p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia em on em.professor_id = p.id INNER JOIN materia m on m.id = em.Materia_id GROUP BY p.id LIMIT 5");
		}
		$DAO->result();
		$count = $DAO->numRows();
		$_SESSION['professores'] = $DAO2->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../professorList");
		
	}

	public function limite(){
		session_start();
		$DAO = new GenericDAO();
		$url = $_POST['page'];
		$mody = ($url*5)-5;
		echo $_SESSION['search'];
		if ($_SESSION['search'] != '' ){
			$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia pm on em.professor_id = p.id INNER JOIN materia pm on m.id = pm.Materia_id WHERE p.nome = '".$_SESSION['search']."' GROUP BY p.id LIMIT 5 OFFSET ".$mody);
		}else{
			$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia pm on em.professor_id = p.id INNER JOIN materia m on m.id = pm.Materia_id GROUP BY p.id LIMIT 5 OFFSET ".$mody);
		}
		$_SESSION['professors'] = $DAO->result();
		$_SESSION['paginaAtual'] = $url;
		header("location: ../professorList");
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
				$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia em on em.professor_id = p.id INNER JOIN materia m on m.id = pm.Materia_id WHERE p.nome = '".$_SESSION['search']."' GROUP BY p.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materias pm on pm.professor_id = p.id INNER JOIN materia m on m.id = pm.Materia_id GROUP BY p.id LIMIT 5 OFFSET ".$mody);
			}
			
			$_SESSION['professors'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
			header("location: ../professorList");
		}else{
			header("location: ../professorList");
		}
		if (isset($_POST['preview']) && $_POST['preview'] > 0) {
			$url = $_POST['preview'];
			$mody = ($url*5)-5;
			if ($_SESSION['search'] != ''){
				$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia pm on pm.professor_id = p.id INNER JOIN materia m on m.id = em.Materia_id WHERE p.nome = '".$_SESSION['search']."' GROUP BY p.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materias pm on em.professor_id = p.id INNER JOIN materia m on m.id = pm.Materia_id GROUP BY p.id LIMIT 5 OFFSET ".$mody);
			}
			$_SESSION['professores'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
		}else{
			header("location: ../professorList");
		}
	}
	public function filtro(){
		session_start();
		$materia = $_POST['selecionarMateria'];
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		$DAO->query("SELECT p.id, p.nome, p.imagem, p.descricao FROM professor p");
		$DAO2->query("SELECT p.nome, p.id,  p.imagem, GROUP_CONCAT(m.nome) as nomes FROM professor p INNER JOIN professor_has_materia pm on em.professor_id = p.id INNER JOIN materia m on m.id = pm.Materia_id WHERE m.nome = '".$materia."' GROUP BY p.id LIMIT 5");
		$DAO->result();
		$count = $DAO->numRows();
		$_SESSION['professores'] = $DAO2->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../professorList");
	}

}

 ?>