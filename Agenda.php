<?php
session_start();
$user = $_SESSION['usuario_logado'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<style>
body {
 background-image: url("images/fundo.jpg");
 background-color: #cccccc;
}
</style>
    <head>
        <!-- modal -->
        <title>Agendar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<LINK REL="SHORTCUT ICON" href="images/icon.png">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
	<center>
	<br><br><br><br><br><br><br>
        <div class="container">
            <h2><i>AGENDAMENTO DE HORÁRIOS</i></h2>
			<br>
            <!-- Botão para carregar o modal -->
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#modalCli">
                Agendar
            </button>
			<br><br>
			<a href="index.html" class="btn btn-danger">Página Inicial</a>
            <br><br><br>
            <img src="images/calen.png" width="150" weight="150"/>
	</center>
            <!-- Modal Cliente -->
            <div class="modal fade" id="modalCli">
            <div class="modal-dialog">
                <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h4 class="modal-title">Agendamento</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class = "modal-body">
               <form action = "agendamentoTry.php" method = "post">
			   <label>Cliente: </label>
					<br>
                    <input type = "text" size = "40" name = "cliente" value = "<?php echo $user ?>">
					<hr>
			   <label>Serviço: </label>
			   <br>
			   <select name="cbbServico">
					<?php
						try{
							$con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");			
							$sql = 'SELECT * FROM servico';
					
							foreach ($con->query($sql) as $row){ ?>
							
			   
					<option value=<?php echo $row['id']; ?>> <?php echo utf8_encode($row['nome']); ?>&nbsp;&nbsp;&nbsp;R$: <?php echo $row['valor']; ?></option>
					<?php
							}
						} catch (PDOException $e)
						{
							echo "Erro: " . $e->getMessage();
						}
						
					?>
					
				</select>
				<hr>
                    <label>Data: </label>
					<br>
                    <input type = "date" size = "40" name = "data">
                    <hr />
                     <label>Hora: </label>
					 <br>
                    <input type = "time" size = "40" name = "hora">
                    <hr />
               
					<input type = "submit" name = "btnAgendar" 
						value = "Agendar">
						
					<input type = "submit" name = "btnConsultar" 
						value = "Consultar">
						
					<input type = "submit" name = "btnAlterar" 
						value = "Alterar">
						
					<input type = "submit" name = "btnDeletar" 
						value = "Deletar">
			   
			   </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">
                            Fechar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>