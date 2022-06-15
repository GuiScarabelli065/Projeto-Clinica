<?php

    require_once("Conexao.php");
    require_once("Paciente.php");
    require_once("Profissional.php");

    class Agenda{
        private $idagenda;
        private $dtagenda;
        private $horaagenda;
        private $paciente;
        private $profissional;

        public function getIdAgenda(){
            return $this->idagenda;
        }
        public function setIdAgenda($idagenda){
            $this->idagenda = $idagenda;
        }
        public function getDtAgenda(){
            return $this->dtagenda;
        }
        public function setDtAgenda($dtagenda){
            $this->dtagenda = $dtagenda;
        }
        public function getHoraAgenda(){
            return $this->horaagenda;
        }
        public function setHoraAgenda($horaagenda){
            $this->horaagenda = $horaagenda;
        }
        public function getPaciente(){
            return $this->paciente;
        }
        public function setPaciente($paciente){
            $this->paciente = $paciente;
        }
        public function getProfissional(){
            return $this->profissional;
        }
        public function setProfissional($profissional){
            $this->profissional = $profissional;
        }

        public function cadastrar($agenda){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbagenda(dtagenda, horaagenda,
                            idpaciente, idprofissional) VALUES(?, ?, ?, ?)");

            $stmt->bindValue(1, $agenda->getDtAgenda());
            $stmt->bindValue(2, $agenda->getHoraAgenda());
            $stmt->bindValue(3, $agenda->getPaciente()->getIdPaciente());
            $stmt->bindValue(4, $agenda->getProfissional()->getIdProfissional());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idagenda, dtagenda, horaagenda, 
                            nomepaciente, nomeprofissional FROM tbagenda
                            -- INNER JOIN tbPaciente ON tbpaciente.idpaciente = tbagenda.idpaciente
                            -- INNER JOIN tbprofissional ON tbprofissional.idprofissional = tbagenda.idprofissional";
            $resultado = $conexao->query($querySelect);
            $lista_agenda = $resultado->fetchAll();
            return $lista_agenda;   
        }

}

?>