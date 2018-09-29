<?php 
	class Evento{
		
		private $id;
		private $nome;
		private $descricao;
		private $data_inicial;
		private $data_final;
		private $imagem;

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
			$this->data_inicial = $data_inicial;
			return $this;
		}

		public function getData_final() {
			return $this->data_final;
		}

		public function setData_final($data_final) {
			$this->data_final = $data_final;
			return $this;
		}
		public function getImagem() {
			return $this->imagem;
		}
		public function setImagem($imagem) {
			$this->imagem = $imagem;
			return $this;
		}
		
	}