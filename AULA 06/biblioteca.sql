create database Biblioteca;

use Biblioteca;

create table Livros(
codlivro int not null auto_increment PRIMARY KEY,
titulo varchar(255) not null,
autor varchar(255) not null,
editora varchar(255) not null,
emprestimo varchar(3) not null
);
 
INSERT INTO Livros (titulo, autor, editora, emprestimo) VALUES

('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Agir', 'Sim'),
('Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Rocco', 'Sim'),
('O Senhor dos Anéis', 'J.R.R. Tolkien', 'Martins Fontes', 'Sim'),
('O Alquimista', 'Paulo Coelho', 'HarperCollins', 'Não'),
('Memórias Póstumas de Brás Cubas', 'Machado de Assis', 'Penguin Companhia', 'Sim');


create table cliente (
codcliente int not null auto_increment PRIMARY KEY,
nome  varchar(255),
cpf varchar(14),
telefone varchar(255),
endereco varchar(255),
email varchar(255)
);

INSERT INTO cliente (nome, cpf, telefone, endereco, email) VALUES
('Ana Maria da Silva', '123.456.789-00', '(11) 91234-5678', 'Rua das Flores, 123 - São Paulo, SP', 'ana.silva@email.com'),
('João Pedro Almeida', '987.654.321-00', '(21) 99876-5432', 'Av. Brasil, 456 - Rio de Janeiro, RJ', 'joao.p.almeida@email.com'),
('Carla Souza Oliveira', '111.222.333-44', '(31) 98888-7777', 'Rua Minas Gerais, 789 - Belo Horizonte, MG', 'carla.oliveira@email.com');

select * from cliente ;

select * from Livros;

