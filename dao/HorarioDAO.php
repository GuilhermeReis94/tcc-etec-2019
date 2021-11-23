<?php
class HorarioDAO
{
    public $id;
    public $descHorario;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
        }
    }

    public function excluir()
    {
        $sql = "DELETE FROM mensagens WHERE id=". $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=bdbarbearia', 'root', '');
        $conexao->exec($sql);
    }

}