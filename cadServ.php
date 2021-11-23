<!DOCTYPE html>
<html lang="pt-br">
<style>
body {
 background-image: url("images/fundo.jpg");
 background-color: #cccccc;
 webkit-background-size: cover;
 moz-background-size: cover;
 o-background-size: cover;
 background-size: cover;
}
</style>
            <?php $con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
            $sql = 'SELECT agenda.id, nome, data, hora, agenda.situacao  FROM agenda INNER JOIN cliente ON cliente.id = agenda.idCliente';
            ?>

    <head>
        <!-- modal -->
        <title>Painel Administrativo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-widht, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <LINK REL="SHORTCUT ICON" href="images/icon.png">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
	<center>
	<br><br><br><br><br>
        <div class="container">
            <h2><i>PAINEL ADMINISTRATIVO</i></h2>
			<br>
            <!-- Botão para carregar o modal -->
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#modalCli">
                Cadastrar Serviço
            </button>
			<br><br>
			<a href="cadServ.php" class="btn btn-success">Atualizar</a>
			<br><br>
			<a href="index.html" class="btn btn-danger">Sair</a>
            <br><br><br>
			<div class="conatiner theme-showcase" role="main">
			<div class="row">
				<table class="table">

				<h1>HORÁRIOS</h1>

					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Data</th>
							<th>Hora</th>
							<th>Situação</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($con->query($sql) as $linha){
								echo "<tr>";
									echo "<td>".$linha['id']."</td>";
									echo "<td>".$linha['nome']."</td>";
									echo "<td>".$linha['data']."</td>";
									echo "<td>".$linha['hora']."</td>";
									echo "<td>".$linha['situacao']."</td>";
									?>
									<td>
									  <a href="agenda-confirmar.php?id=<?php echo $linha['id'] ?>" 
										 class="btn btn-sm btn-success">Confirmar</a>
										 
										 <a href="agenda-desmarcar.php?id=<?php echo $linha['id'] ?>" 
										 class="btn btn-sm btn-warning">Desmarcar</a>
										 
										 <a href="agenda-excluir.php?id=<?php echo $linha['id'] ?>" 
										 class="btn btn-sm btn-danger">Excluir</a>
										 
									</td>
									
									</form>
								</tr>
								<br><br><br><br>
							<?php }	?>
							
					</tbody>
				</table>
				</div>
				</div>
				
				<?php $con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
					$sql = 'SELECT mensagens.id, nome, email, assunto, mensagem  FROM mensagens';
				?>
							
			<div class="conatiner theme-showcase" role="main">
			<div class="row">
				<table class="table">
				<h1>MENSAGENS</h1>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Assunto</th>
							<th>Mensagem</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($con->query($sql) as $linha){
								echo "<tr>";
									echo "<td>".$linha['id']."</td>";
									echo "<td>".$linha['nome']."</td>";
									echo "<td>".$linha['email']."</td>";
									echo "<td>".$linha['assunto']."</td>";
									echo "<td>".$linha['mensagem']."</td>";
									?>
									<td>
										 
									<a href="mensagem-excluir.php?id=<?php echo $linha['id'] ?>" 
									class="btn btn-sm btn-danger">Excluir</a>
										 
								</td>
									</form>
								</tr>
							<?php }	?>
							
					</tbody>
				</table>
				</div>
				</div>
				
				<?php $con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
					$sql = 'SELECT cliente.id, nome, telefone, celular, email, situacao  FROM cliente';
				?>
							
			<div class="conatiner theme-showcase" role="main">
			<div class="row">
				<table class="table">
				<h1>CLIENTES</h1>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Telefone</th>
							<th>Celular</th>
							<th>E-mail</th>
							<th>Situação</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($con->query($sql) as $linha){
								echo "<tr>";
									echo "<td>".$linha['id']."</td>";
									echo "<td>".$linha['nome']."</td>";
									echo "<td>".$linha['telefone']."</td>";
									echo "<td>".$linha['celular']."</td>";
									echo "<td>".$linha['email']."</td>";
									echo "<td>".$linha['situacao']."</td>";
									?>
									<td>			
										 <a href="cliente-ativar.php?id=<?php echo $linha['id'] ?>" 
										 class="btn btn-sm btn-success">Ativar</a>
									
										 <a href="cliente-desativar.php?id=<?php echo $linha['id'] ?>" 
										 class="btn btn-sm btn-warning">Desativar</a>
									</td>
									
									</form>
								</tr>
							<?php }	?>
							
					</tbody>
				</table>
				</div>
				</div>	
			
			<?php $con = new PDO("mysql:host=localhost;dbname=bdBarbearia", "root", "");
					$sql = 'SELECT servico.id, nome, valor FROM servico';
				?>
			
			<div class="conatiner theme-showcase" role="main">
			<div class="row">
				<table class="table">
				<h1>SERVIÇOS</h1>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Valor</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($con->query($sql) as $linha){
								echo "<tr>";
									echo "<td>".$linha['id']."</td>";
									echo "<td>".$linha['nome']."</td>";
									echo "<td>R$: ".$linha['valor']."</td>";
									?>									
								<td>
										 
									<a href="servico-excluir.php?id=<?php echo $linha['id'] ?>" 
									class="btn btn-sm btn-danger">Excluir</a>
										 
								</td>
									</form>
								</tr>
							<?php }	?>
							
					</tbody>
				</table>
				</div>
				</div>
		
			
			<br><br><br>
            </center>
    
            <!-- Modal Cliente -->
            <div class="modal fade" id="modalCli">
            <div class="modal-dialog">
                <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h4 class="modal-title">Informações</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class = "modal-body">
               <form action = "cadServicoTry.php" method = "post">
				<label>Nome:</label>
				<br>
                <input type = "text" size = "40" name = "nome">
                <hr />
                <label>Valor: </label>
				<br>
                    <input type = "text" size = "40" name = "valor">
                    <hr />
               
					<input type = "submit" name = "btnCadServico" 
						value = "Cadastrar">
			   
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