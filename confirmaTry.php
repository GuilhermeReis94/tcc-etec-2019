<?php
    if(isset($_POST['confirmar']))
    {
		confirmar();
	}
	if(isset($_POST['apagar']))
    {
		apagar();
	}
	
function confirmar()
	{
        $id = (int)$_GET["id"];
        $situacao = $_POST['situacao'];
		try
		{
			
			$sql = "UPDATE agenda" .
			" SET situacao = :situacao WHERE id = :id";
			
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
			
			$stmt = $con->prepare($sql);
			
			$stmt->execute( array( ':situacao' => $situacao));

		}
		catch( PDOException $e )
		{
			echo "Erro: " . $e->getMessage();
		}
	} // fim do bloco confirmar

function apagar()
	{
		$id = (int)$_GET["id"];
		try
		{
		$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
		
        $stmt = $obj_mysqli->prepare("DELETE FROM agenda WHERE id = '$id'");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		}
		catch( PDOException $e )
		{
			echo "Erro: " . $e->getMessage();
		}
	} // fim do bloco apagar
?>