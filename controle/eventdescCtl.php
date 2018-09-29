<?php
require_once '../gdee/modelo/DAO/GenericDAO.php';
class eventdescCtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}else{
			$logado = $_SESSION['login'];
			$this->loadView('eventdesc');
		}	
	}
	public function listarDados(){
		session_start();
		$DAO = new GenericDAO();
		$DAO1 = new GenericDAO();
		$DAO2 = new GenericDAO();
		$DAO3 = new GenericDAO();
		$id = $_POST['id'];
		$_SESSION['idEv'] = $id;
		$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, e.data_inicial, e.data_final, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id RIGHT JOIN professor_has_evento pe on pe.Evento_id = e.id RIGHT JOIN professor p on p.id = pe.Professor_id WHERE e.id ='".$id."'  GROUP BY e.id ");
		$DAO1->query("SELECT a.id, a.nome, a.descricao, a.data_final, a.data_inicial FROM atividade a WHERE a.Evento_id = '".$id."'");
		$DAO2->query("SELECT a.id, a.nome, a.email FROM aluno a WHERE a.id NOT IN (SELECT ae.Aluno_id FROM aluno_has_evento ae WHERE   ae.Evento_id = '".$id."')");
		$DAO3->query("SELECT a.id, a.nome, a.email FROM aluno a INNER JOIN aluno_has_evento ae on ae.Aluno_id = a.id INNER JOIN evento e on e.id = ae.Evento_id WHERE ae.Evento_id = '".$_SESSION['idEv']."'");
		$_SESSION['dados3'] = $DAO->result();
		$_SESSION['atividade'] = $DAO1->result();
		$_SESSION['alunoId'] = $DAO2->result();
		$_SESSION['alunoList'] = $DAO3->result();
		header("location: ../eventdesc");
	}

	public function registrarAtiv(){
		session_start();
		$DAO = new GenericDAO();
		$atividade = new Atividade();

		$atividade->setNome($_POST['nome']);
		$atividade->setDescricao($_POST['descricao']);
		$atividade->setEvento_id($_SESSION['idEv']);

		$DAO->insert("atividade", array(
			"nome" => $atividade->getNome(),
			"descricao" => $atividade->getDescricao(),
			"data_inicial" => $_POST['data_inicial'],
			"data_final" => $_POST['data_final'],
			"Evento_id" => $atividade->getEvento_id(), 
		));
		header("location: ../eventosList");
	}
	public function registrarAl(){
		session_start();
		$DAO = new GenericDAO();
		$idAl = $_POST['aluno'];
		foreach ($idAl as $idS) {
			$DAO->insert("aluno_has_evento", array(
				"Evento_id" => $_SESSION['idEv'],
				"Aluno_id" => $idS,
			));
		}
		

		header("location: ../eventosList");
	}
}
?>