<?php 
class Atividade{

	private $id;
	private $nome;
	private $descricao;
	private $data_inicial;
	private $data_final;
	private $Evento_id;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getdescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
	public function getData_inicial() {
		return $this->data_inicial;
	}
	public function setData_inicial($data_inicial) {
		$this->data_inical = $data_inicial;
		return $this;
	}
	public function getData_final() {
		return $this->data_final;
	}

	public function setData_final($data_final) {
		$this->data_final = $data_final;
		return $this;
	}
	public function getEvento_id() {
		return $this->Evento_id;
	}
	public function setEvento_id($Evento_id) {
		$this->Evento_id = $Evento_id;
		return $this;
	}
}
?>