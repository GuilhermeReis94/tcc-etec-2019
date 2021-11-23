<?php 
require_once 'dao/AgendaDAO.php';

$id = $_GET['id'];
$agendaDAO = new AgendaDAO($id);
$agendaDAO->desmarcar();

header('Location: cadServ.php');
?>