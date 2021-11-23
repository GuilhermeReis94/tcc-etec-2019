CREATE DATABASE IF NOT EXISTS bdBarbearia;

USE bdBarbearia;

-- Tabela de produtos
CREATE TABLE IF NOT EXISTS produto (
	id					int NOT NULL,
	nome				varchar(40),
	valor				decimal(10,2),
	descricao		varchar(100),
	CONSTRAINT produtosPK PRIMARY KEY (id));

-- Tabela de serviços
CREATE TABLE IF NOT EXISTS servico (
	id					int NOT NULL AUTO_INCREMENT,
	nome				varchar(40),
	valor				decimal(10,2),
	CONSTRAINT servicoPK PRIMARY KEY (id));
	
-- Tabela de clientes
CREATE TABLE IF NOT EXISTS cliente (
	id					int NOT NULL AUTO_INCREMENT,
	nome				varchar(150),
	telefone			varchar(15),
	celular			varchar(15),
	email				varchar(150),
	senha				varchar(50), 
	CONSTRAINT clientePk PRIMARY KEY (id));
	
-- Tabela de agenda
CREATE TABLE IF NOT EXISTS agenda (
	id					int NOT NULL AUTO_INCREMENT,
	data				date NOT NULL,
	hora				time NOT NULL,
	CONSTRAINT agendaPk PRIMARY KEY (id));
	
-- Tabela de venda
CREATE TABLE IF NOT EXISTS venda (
	id					int NOT NULL AUTO_INCREMENT,
	dataVenda		date NOT NULL,
	tipoVenda		varchar(10),
	idProduto		int NOT NULL,
	idServico		int NOT NULL,
	idCliente 		int NOT NULL,
	situacao			varchar(7),
	CONSTRAINT vendaPk PRIMARY KEY (id));
	
-- Inserir os produtos
INSERT INTO produto (id, nome, valor, descricao)
VALUES (1, 'Balm Barba', '25.00', 'O balm para barba alinha, dá textura e volume à barba. Deixa os fios comportados e adiciona uma camada de proteção que vai ajudar a mante-los no lugar.'),
       (2, 'Pomada Capilar', '20.00', 'A pomada capilar oferece um efeito opaco, com fixação média, ideal para estruturar e modelar os cortes curtos e médios.'),
	   (3, 'Gel', '15.00', 'O gel proporciona definição, textubdbarbeariara e brilho aos cabelos. Não contém álcool e permite moldar os cabelos de várias formas e estilos.'),
	   (4, 'Óleo Barba', '35.00', 'A barba acaba ficando muito exposta às agressões naturais do dia-a-dia (poluição, sol, bdbarbeariavento, entre outras), o óleo foi testado com os clientes barbudos mais exigentes do mercado para resolver esses problemas.'),
	   (5, 'Pós Barba', '25.00', 'O gel pós barba refresca e acalma a pele e previne contra as irritações que são comuns no pós barbear.');

-- Inserir os serviços
INSERT INTO servico (id, nome, valor)
VALUES (1, 'Corte Apenas Máquina', '15.00'),
	   (2, 'Barba Completa', '15.00'),
	   (3, 'Barba Desenhada', '15.00'),
	   (4, 'Barba Desenhada e Pigmentada', '20.00'),
	   (5, 'Corte Simples', '20.00'),
	   (6, 'Corte Degradê', '25.00'),
	   (7, 'Relaxamento', '30.00'),
	   (8, 'Coloração', '30.00'),
	   (9, 'Finalização', '5.00');

-- Inserir os clientes
INSERT INTO cliente (id, nome, telefone, celular, email, senha)
VALUES (1, 'Guilherme Reis', '38631406', '991113699', 'g.iago@bol.com.br', md5('senhateste'));servicoservico