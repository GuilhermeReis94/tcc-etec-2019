<?php 
require_once 'dao/ServicoDAO.php';

$id = $_GET['id'];
$servicoDAO = new ServicoDAO($id);
$servicoDAO->excluir();

header('Location: cadServ.php');
?>