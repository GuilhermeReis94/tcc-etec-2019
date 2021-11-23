
<?php
    if(isset($_POST['btnSalvar']))
    {
        salvar();
		echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1:8888/TCC/cadastro.html'>";
    }
	if(isset($_POST['btnConsultar']))
    {
        consultar();
    }
	if(isset($_POST['btnAlterar']))
    {
        alterar();
		echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1:8888/TCC/cadastro.html'>";
    }
    if(isset($_POST['btnLogin']))
    {
        login();
    }
	
    function salvar()
    {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $email = $_POST['email']; 
            $senha = $_POST['senha'];
            $password = md5($senha);
			
			try{
				
				$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");			
				
				$stmt = $con->prepare("INSERT INTO cliente (nome, telefone, celular, email, senha) VALUES (?, ?, ?, ?, ?)");
				$stmt->bindParam (1, $nome);
				$stmt->bindParam (2, $telefone);
				$stmt->bindParam (3, $celular);
				$stmt->bindParam (4, $email);
				$stmt->bindParam (5, $password);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();				
			}
    } // chave do salvar
    
    function login() {
         $email = $_POST['email']; 
         $senha = $_POST['senha'];
		 $password = md5($senha);
         $servidor = "localhost";
         $usuario = "root";
         $senhabd = "";
         $dbname = "bdbarbearia";
		
		try{
			$conn = mysqli_connect($servidor, $usuario, $senhabd, $dbname);


                $result_email= "SELECT * FROM cliente WHERE email = '$email'" ;
                $result_senha = "SELECT * FROM cliente WHERE senha = '$password'" ;
                
                $resultado_email = mysqli_query($conn, $result_email);
                $resultado_senha = mysqli_query($conn, $result_senha);
                //echo $password;
				
                if(mysqli_num_rows ($resultado_email) > 0)
         {
                  if(mysqli_num_rows ($resultado_senha) > 0)
                  {
					  session_start();
					  $_SESSION['usuario_logado'] = $email;
					  
					  $user = $_SESSION['usuario_logado'];

                           echo"<script language='javascript' type='text/javascript'>
                           window.location.href='horario.html'
                           </script>";
                  }else
                  {
                           echo"<script language='javascript' types='text/javascript'>
                          alert('Senha Incorreta!');
                           window.location.href='login.html'
                           </script>";  
                  }
         }
         else
         {
                  echo"<script language='javascript' types='text/javascript'>
                  alert('E-mail Incorreto!');
                  window.location.href='login.html'
                  </script>";  
         }

		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();	
		}
    } // fim do login

	function alterar()
	{
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $email = $_POST['email']; 
        $senha = $_POST['senha'];
		$password = md5($senha);
		try
		{
			
			$sql = "UPDATE cliente" .
			" SET nome = :nome, telefone = :tele, " .
			" celular = :cel, email = :email, " . 
			" senha = :senha WHERE email = :email";
			
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
			
			$stmt = $con->prepare($sql);
			
			$stmt->execute( array( ':nome' => $nome, 
								  ':tele' => $telefone,
								  ':cel' => $celular, 
								  ':email' => $email,
								  ':senha' => $password)); 

		}
		catch( PDOException $e )
		{
			echo "Erro: " . $e->getMessage();
		}
	} // fim do bloco alterar
    
    function consultar() {
		
		try{
			$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", 
						"root", "");			
			$sql = 'SELECT * FROM cliente';

			foreach ($con->query($sql) as $row) 
			{
				echo $row['id'] . "<hr />";
				echo $row['nome'] . "<hr />";
				echo $row['telefone'] . "<hr />";
				echo $row['celular'] . "<hr />";
				echo $row['email'] . "<hr />";
			}
		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();	
		}
    } // fim do bloco consultar
?> 