<?php
require '../gdee/modelo/DAO/GenericDAO.php';
class eventosListCtl extends controller{

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
			$this->loadView('eventosList');
		}
	}

	public function listarEventos(){
		session_start();
		if(isset($_SESSION['search'])){
			$_SESSION['search'] = '';
		}
		
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		if (isset($_POST['search'])) {
			$search = $_POST['search'];
			$_SESSION['search'] = $search;
			$DAO->query("SELECT e.id, e.nome, e.descricao, e.imagem, e.data_inicial, e.data_final FROM evento e WHERE e.nome ='".$search."'");
			$DAO2->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id WHERE e.nome = '".$search."' GROUP BY e.id LIMIT 5");
		}else{
			$DAO->query("SELECT e.id, e.nome, e.descricao, e.imagem, e.data_inicial, e.data_final FROM evento e ");
			$DAO2->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id GROUP BY e.id LIMIT 5");
		}
		$DAO->result();
		$count = $DAO->numRows();
		$_SESSION['eventos'] = $DAO2->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../eventosList");
		
	}

	public function limite(){
		session_start();
		$DAO = new GenericDAO();
		$url = $_POST['page'];
		$mody = ($url*5)-5;
		echo $_SESSION['search'];
		if ($_SESSION['search'] != '' ){
			$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id WHERE e.nome = '".$_SESSION['search']."' GROUP BY e.id LIMIT 5 OFFSET ".$mody);
		}else{
			$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id GROUP BY e.id LIMIT 5 OFFSET ".$mody);
		}
		$_SESSION['eventos'] = $DAO->result();
		$_SESSION['paginaAtual'] = $url;
		header("location: ../eventosList");
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
				$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id GROUP BY e.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id GROUP BY e.id LIMIT 5 OFFSET ".$mody);
			}
			
			$_SESSION['eventos'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
			header("location: ../eventosList");
		}else{
			header("location: ../eventosList");
		}
		if (isset($_POST['preview']) && $_POST['preview'] > 0) {
			$url = $_POST['preview'];
			$mody = ($url*5)-5;
			if ($_SESSION['search'] != ''){
				$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id WHERE e.nome = '".$_SESSION['search']."' GROUP BY e.id LIMIT 5 OFFSET ".$mody);
			}else{
				$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id GROUP BY e.id LIMIT 5 OFFSET ".$mody);
			}
			$_SESSION['eventos'] = $DAO->result();
			$_SESSION['paginaAtual'] = $url;
		}else{
			header("location: ../eventosList");
		}
	}
	public function filtro(){
		session_start();
		$materia = $_POST['selecionarMateria'];
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		$DAO->query("SELECT e.id, e.nome, e.imagem, e.descricao FROM evento e");
		$DAO2->query("SELECT e.nome, e.id, e.descricao, e.imagem, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id LEFT JOIN professor_has_evento pe on pe.Evento_id = e.id LEFT JOIN professor p on p.id = pe.Professor_id WHERE m.nome = '".$materia."' GROUP BY e.id LIMIT 5");
		$DAO->result();
		$count = $DAO->numRows();
		$_SESSION['eventos'] = $DAO2->result();
		$_SESSION['numero'] = ceil(($count/100)*20);
		header("location: ../eventosList");
	}

}