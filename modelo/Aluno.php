<?php
	class Aluno{
		private $id;
		private $nome;
		private $email;
		private $senha;
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
		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
			return $this;
		}
		public function getSenha() {
			return $this->senha;
		}

		public function setSenha($senha) {
			$this->senha = $senha;
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

	?>