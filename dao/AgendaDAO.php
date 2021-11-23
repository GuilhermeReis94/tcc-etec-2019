<?php
class AgendaDAO
{
    public $id;
    public $descAgenda;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
        }
    }

     public function confirmar()
    {
        $sql = "UPDATE agenda SET situacao = 'OK' WHERE id = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }
	
	 public function desmarcar()
    {
        $sql = "UPDATE agenda SET situacao = 'Pendente' WHERE id = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }

    public function excluir()
    {
        $sql = "DELETE FROM agenda WHERE id=". $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }

}
?>