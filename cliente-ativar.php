<?php 
require_once 'daoDes/ClienteDAO.php';

$id = $_GET['id'];
$clienteDAO = new ClienteDAO($id);
$clienteDAO->ativar();

header('Location: cadServ.php');
?>