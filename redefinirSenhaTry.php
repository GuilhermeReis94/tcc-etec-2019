
<?php
    if(isset($_POST['btnRedefinir']))
    {
        redefinir();
    }
    
	function redefinir()
	{
        $email = $_POST['email'];
        $senha = $_POST['senha'];
		$password = md5($senha);
		try
		{
			
			$sql = "UPDATE cliente" .
			" SET senha = :senha WHERE email = :email";
			
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
			
			$stmt = $con->prepare($sql);
			
			$stmt->execute( array( ':email' => $email, 
								  ':senha' => $password)); 

		}
		catch( PDOException $e )
		{
			echo "Erro: " . $e->getMessage();
		}
	} // fim do bloco alterar
?> 