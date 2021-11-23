<?php
    class ClienteDAO {
        protected $db;
        
        public function __construct() {
            require('pdo.php');
        }
        
        //Método GET
        public function get($id){
            $stmt = $this->db->query("SELECT * from cliente where id = $id");
            
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            
            $cliente = new Cliente();
            $cliente->setId($obj->id);
            $cliente->setNome($obj->nome);
            $cliente->setTelefone($obj->telefone);
            $cliente->setCelular($obj->celular);
            $cliente->setEmail($obj->email);
            $cliente->setSenha($obj->senha);
            
            return $cliente;
        }
        
        //Método Salvar
        function salvar()
    {
            $id = $_POST['nome'];
            $nome = $_POST['cpf'];
            $telefone = $_POST['rg'];
            $celular = $_POST['endereco'];
            $email = $_POST['telefone']; 
            $senha = $_POST['celular'];
            
			try{
				
				$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");			
				
				$stmt = $con->prepare("INSERT INTO cliente (id, nome, telefone, celular, email, senha) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bindParam (1, $id);
				$stmt->bindParam (2, $nome);
				$stmt->bindParam (3, $telefone);
				$stmt->bindParam (4, $celular);
				$stmt->bindParam (5, $email);
				$stmt->bindParam (6, $senha);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();				
			}
    } // chave do salvar

     public function confirmar()
    {
        $sql = "UPDATE cliente SET situacao = 'Desativado' WHERE id = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }
    }
?>