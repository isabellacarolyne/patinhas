CREATE TABLE usuario (
id_usuario int auto_increment PRIMARY KEY,
nome varchar(255) not null,
cpf varchar(11) not null,
email varchar(100) not null,
senha varchar(8) not null
);

CREATE TABLE pet (
id_pet int auto_increment PRIMARY KEY,
nome varchar(100) not null,
dt_nascimento date,
especie varchar(100) not null,
raca varchar(80),
id_usuario int not null,
FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE servico (
id_servico int auto_increment PRIMARY KEY,
nome varchar(100) not null,
valor float(6, 2) not null
);

CREATE TABLE agendamento (
id_agendamento int auto_increment PRIMARY KEY,
dt_inicial datetime not null,
dt_final datetime,
observacao text(200),
id_pet int not null,
FOREIGN KEY (id_pet) REFERENCES pet (id_pet),
id_servico int not null,
FOREIGN KEY (id_servico) REFERENCES servico (id_servico)
);

ALTER TABLE agendamento ADD valor_total float(7, 2);

/* esses inserts são feitos direto no banco, pois é um cadastro interno. O usuário apenas seleciona o serviço e ele é cadastrado na tabela agendamento */
INSERT INTO servico (nome,valor) VALUES
('Hospedagem', 120.00),
('Hospedagem: 7 dias', 700.00),
('Hospedagem: 30 dias', 3000.00),
('Banho', 40.00),
('Tosa', 40.00),
('Consulta vet', 80.00),
('Pacote vacina', 400.00),
('Internacao', 140.00),
('Banho e tosa', 60.00),
('Adestramento', 70.00),
('Adestramento: 5 aulas', 300.00),
('Pacote PET VIP: 7 dias', 850.00),
('Pacote PET VIP: 30 dias', 3600.00),
('PET BOSS Pass', 3780.00);

SELECT * from servico order by nome;

