CREATE DATABASE IF NOT EXISTS bdBarbearia;

USE bdBarbearia;

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
	situacao			varchar(10) DEFAULT 'OK',
	senha				varchar(50), 
	CONSTRAINT clientePk PRIMARY KEY (id));
	
-- Tabela de administradores
CREATE TABLE IF NOT EXISTS administrador (
	id					int NOT NULL AUTO_INCREMENT,
	nome				varchar(150),
	email				varchar(150),
	senha				varchar(50), 
	CONSTRAINT administradorPK PRIMARY KEY (id));
	
-- Tabela de agendamentos
CREATE TABLE IF NOT EXISTS agenda (
	id					int NOT NULL AUTO_INCREMENT,
	idCliente 		int,
	idServico		INT,
	situacao			varchar(10) DEFAULT 'Pendente',
	data				date NOT NULL,
	hora				time NOT NULL,
	CONSTRAINT clienteFK FOREIGN KEY (idCliente) REFERENCES cliente (id),
	CONSTRAINT servicoFK FOREIGN KEY (idServico) REFERENCES servico (id),
	CONSTRAINT agendaPk PRIMARY KEY (id));
	
-- Tabela de mensagens
CREATE TABLE IF NOT EXISTS mensagens (
	id					int NOT NULL AUTO_INCREMENT,
	nome				varchar(150),
	email				varchar(150),
	assunto			varchar(150), 
	mensagem			varchar(500),
	CONSTRAINT mensagemPK PRIMARY KEY (id));

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
	    
INSERT INTO administrador (id, nome, email, senha)
VALUES (1, 'Bruno Almeida', 'bruno_adm', 'bruno_adm'),
		 (2, 'Leonardo Almeida', 'leonardo_adm', 'leonardo_adm');