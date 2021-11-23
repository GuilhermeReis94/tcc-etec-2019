<?php
    class Agenda {
        private $id;
        private $idCliente;
        private $idServico;
        private $situacao;
        private $data;
        private $hora;
        
        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getIdCliente() {
            return $this->idCliente;
        }
        
        public function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }
        
        public function getIdServico() {
            return $this->idServico;
        }
        
        public function setIdServico($idServico) {
            $this->idServico = $idServico;
        }
        
        public function getSituacao() {
            return $this->situacao;
        }
        
        public function setSituacao($situacao) {
            $this->situacao = $situacao;
        }
        
        public function getData() {
            return $this->data;
        }
        
        public function setData($data) {
            $this->data = $data;
        }
        
        public function getHora() {
            return $this->hora;
        }
        
        public function setHora($hora) {
            $this->hora = $hora;
        }
		

        
    }
?>