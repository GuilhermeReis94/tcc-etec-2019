
<?php
    if(isset($_POST['btnCadServico']))
    {
        salvar();
    }
	
    function salvar()
    {
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];
			
			try{
				
				$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");			
				
				$stmt = $con->prepare("INSERT INTO servico (nome, valor) VALUES (?, ?)");
				$stmt->bindParam (1, $nome);
				$stmt->bindParam (2, $valor);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();				
			}
    } // chave do salvar
?> 