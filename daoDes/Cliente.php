<?php
    class Cliente {
        private $id;
        private $nome;
        private $telefone;
        private $celular;
        private $email;
        private $senha;
		private $situacao;
        
        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getNome() {
            return $this->nome;
        }
        
        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function getTelefone() {
            return $this->telefone;
        }
        
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        public function getCelular() {
            return $this->celular;
        }
        
        public function setCelular($celular) {
            $this->celular = $celular;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function setEmail($email) {
            $this->email = $telefone;
        }
        
        public function getSenha() {
            return $this->senha;
        }
        
        public function setSenha($senha) {
            $this->senha = $senha;
        }
		
		 public function getSituacao() {
            return $this->situacao;
        }
        
        public function setSituacao($situacao) {
            $this->situacao = $situacao;
        }  
    }
?>