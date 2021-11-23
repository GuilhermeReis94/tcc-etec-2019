<?php 
require_once 'dao/AgendaDAO.php';

$id = $_GET['id'];
$agendaDAO = new AgendaDAO($id);
$agendaDAO->confirmar();

header('Location: cadServ.php');
?>