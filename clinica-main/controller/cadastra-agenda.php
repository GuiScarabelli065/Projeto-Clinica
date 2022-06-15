<?php
    header("Location: crud-agenda.php");
    
    require_once("../model/Paciente.php");
    require_once("../model/Profissional.php");
    require_once("../model/Agenda.php");

    $paciente = new Paciente();
    $profissional = new Profissional();
    $agenda = new Agenda();

    $agenda->setDtAgenda($_POST['txtData']);
    $agenda->setHoraAgenda($_POST['txtHora']);

    $paciente->setIdPaciente($_POST['paciente']);
    $agenda->setPaciente($paciente);
    
    $profissional->setIdProfissional($_POST['profissional']);
    $agenda->setProfissional($profissional);

    $agenda->cadastrar($agenda);

    // echo("Paciente ". $paciente->getNomePaciente() ." cadastrado com sucesso");

?>