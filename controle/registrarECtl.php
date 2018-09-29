<?php
require '../gdee/modelo/DAO/GenericDAO.php';
require '../gdee/modelo/Aluno.php';
class registrarECtl extends controller{
	
	public function index(){
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			
			echo "ERRO";
			header("location: logar");
		}if($_SESSION['tipo'] == "professor"){
			$logado = $_SESSION['login'];
			$DAO = new GenericDAO();
			$DAO->query("SELECT * FROM materia");
			$_SESSION["materias"] = $DAO->result();
			$this->loadView('registrarE');
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Você não tem autorização para acessar esta area');window.location.href='../logar';</script>";
		}	
	}

	public function registrarEv(){
		session_start();
		$DAO = new GenericDAO();
		$DAO2 = new GenericDAO();
		$DAO3 = new GenericDAO();
		$evento = new Evento();
		$id = $_POST['materia'];
		$evento->setNome($_POST['nome']);
		$evento->setDescricao($_POST['descricao']);
		$evento->setData_inicial($_POST['datainicial']);
		$evento->setData_final($_POST['datainicial']);
		$evento->setImagem($_FILES['imagem']);
		$imagem = $evento->getImagem();		
		if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
			$extensao = substr($_FILES['imagem']['name'], -4);
			print_r(move_uploaded_file($imagem['tmp_name'], '../gdee/controle/arquivos/'.md5($evento->getNome()).$extensao));
			$DAO->insert("evento", array(
				"nome" => $evento->getNome(),
				"descricao" => $evento->getDescricao(),
				"imagem" => md5($evento->getNome()).$extensao,
				"data_inicial" => $evento->getData_inicial(),
				"data_final" => $evento->getData_final(),
			));
			$DAO->query("Select LAST_INSERT_ID()");
			$last_id = $DAO->result();
			foreach ($last_id as $dado) {
				foreach ($id as $dadoId) {
					$DAO2->insert("evento_has_materia", array(
						"Evento_id" => $dado['LAST_INSERT_ID()'],
						"Materia_id" => $dadoId,
					));
				}
			}

			$DAO3->query("SELECT p.id FROM professor p WHERE p.id = '".$_SESSION['id']."'");

			foreach ($last_id as $dado) {
				foreach ($DAO3->result() as $id2) {
					$DAO3->insert("professor_has_evento", array(
						"Evento_id" => $dado['LAST_INSERT_ID()'],
						"Professor_id" => $id2['id'],
					));
				}
			}
			echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso');window.location.href='../eventosList/listarEventos';</script>";
			exit;
			
		}
	}
}