
<?php
    if(isset($_POST['btnAgendar']))
    {
        agendar();
		echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1:8888/TCC/agenda.php'>";
    }
	if(isset($_POST['btnConsultar']))
    {
        consultar();
    }
	
	if(isset($_POST['btnAlterar']))
    {
        alterar();
    }
	if(isset($_POST['btnDeletar']))
    {
        deletar();
		
    }

    function agendar()
    {
			$idCliente = $_POST['cliente'];
            $idServico = $_POST['cbbServico'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];     
			session_start();			
			$userEmail = $_SESSION["usuario_logado"];
            
			try{
				
				$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
                $sql = $con->query("SELECT id FROM cliente WHERE email = '$userEmail'");
                $cli = $sql->fetch(PDO::FETCH_ASSOC);
                
                foreach($cli AS $id){
                    $idCliente = $id['id'];
                }               
					$stmt = $con->prepare("INSERT INTO agenda (idCliente, idServico, data, hora) VALUES (?, ?, ?, ?)");
					$stmt->bindParam (1, $idCliente);
					$stmt->bindParam (2, $idServico);
					$stmt->bindParam (3, $data);
					$stmt->bindParam (4, $hora);
			  
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();				
			}
    } // chave do agendar
    
	function consultar() {
		
		try{
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");			
			$sql = 'SELECT * FROM agenda';
	
			// o foreach percorre uma coleção de dados
			// linha a linha, neste caso do resultado
			// da consulta na tabela cliente
			foreach ($con->query($sql) as $row) 
			{
				// row refere-se a linha,
				// dentro do row é o campo da tabela
				// no banco de dados
				echo $row['idCliente'] . "<hr />";
				echo $row['idServico'] . "<hr />";
				echo $row['situacao'] . "<hr />";
				echo $row['data'] . "<hr />";
				echo $row['hora'] . "<hr />";
			}
		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();	
		}
    } // fim do consultar
	
	function alterar()
	{
        $idCliente = $_POST['cliente'];
        $idServico = $_POST['cbbServico'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];  
		session_start();			
		$userEmail = $_SESSION["usuario_logado"];
		try
		{
			$sql = "UPDATE agenda" .
			" SET idServico = :cbbServico, data = :data, hora = :hora WHERE email = :usuario_logado";
			
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
			
			$stmt = $con->prepare($sql);
			
			$stmt->execute( array( ':cbbServico' => $idServico,
								   ':data' => $data, 
								   ':usuario_logado' => $userEmail,
								   ':hora' => $hora));

		}
		catch( PDOException $e )
		{
			// A variavel e tem o codigo de erro
			echo "Erro: " . $e->getMessage();
		}
	} // fim do bloco alterar
	
	function deletar()
	{
		$idCliente = $_POST['cliente'];
		session_start();			
		$userEmail = $_SESSION["usuario_logado"];
		
		try
		{
			$sql = "DELETE FROM agenda WHERE idCliente = usuario_logado";
			
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", 
						"root", "");
			
			$stmt = $con->prepare($sql); 
			
			$stmt->execute( array( ':idCliente' => $idCliente ) );
		}
		catch( PDOException $e )
		{
			// A variavel e tem o codigo de erro
			echo "Erro: " . $e->getMessage();
		}
	}
?> 









