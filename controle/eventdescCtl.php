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
		$id = $_POST['id'];
		$DAO->query("SELECT e.nome, e.id, e.descricao, e.imagem, e.data_inicial, e.data_final, GROUP_CONCAT(m.nome) as nomess, GROUP_CONCAT(p.nome) as nomes FROM evento e INNER JOIN evento_has_materia em on em.Evento_id = e.id INNER JOIN materia m on m.id = em.Materia_id RIGHT JOIN professor_has_evento pe on pe.Evento_id = e.id RIGHT JOIN professor p on p.id = pe.Professor_id WHERE e.id ='".$id."'  GROUP BY e.id ");
		$DAO1->query("SELECT a.id, a.nome, a.descricao, a.data_final, a.data_inicial FROM atividade a RIGHT JOIN evento e on e.id = '".$id."' GROUP BY a.id ");
		$_SESSION['dados3'] = $DAO->result();
		$_SESSION['atividade'] = $DAO->result();
		header("location: ../eventdesc");
	}
}
?>

 ?>