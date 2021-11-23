<?php 
require_once 'daoDes/ClienteDAO.php';

$id = $_GET['id'];
$clienteDAO = new ClienteDAO($id);
$clienteDAO->desativar();

header('Location: cadServ.php');
?>