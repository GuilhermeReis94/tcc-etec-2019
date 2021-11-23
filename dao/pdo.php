<?php
    try { 
        //conectar ao banco
        $this->db = new PDO('mysql:host=localhost;dbname=bdBarbearia', 'root', '');
        //definir conjunto de caracteres
        $this->db->exec('set character set utf8');
        //exibir erros de SQL
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch (PDOException $e) {
        echo "<p>Não foi possível conectar ao banco</p>";
        echo $e->getMessage();
        die();
        
    }