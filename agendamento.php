<?php
    if(isset($_POST['btnSalvar']))
    {
        salvar();
    }
    function salvar()
    {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $email = $_POST['email']; 
            $senha = $_POST['senha'];
            $password = md5($senha);
			
            $con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
            
            $stmt = $con->prepare("INSERT INTO agenda (nome, telefone, celular, email, senha) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam (1, $nome);
            $stmt->bindParam (2, $telefone);
            $stmt->bindParam (3, $celular);
            $stmt->bindParam (4, $email);
            $stmt->bindParam (5, $senha);
            $stmt->execute();
    }    
?> 