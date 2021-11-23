<?php
class ClienteDAO
{
    public $id;
    public $descCliente;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
        }
    }

     public function desativar()
    {
        $sql = "UPDATE cliente SET situacao = 'Desativado' WHERE id = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }
	
	public function ativar()
    {
        $sql = "UPDATE cliente SET situacao = 'OK' WHERE id = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }
}
?>