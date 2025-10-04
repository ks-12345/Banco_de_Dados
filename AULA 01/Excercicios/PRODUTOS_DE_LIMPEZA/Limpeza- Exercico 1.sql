create database Limpeza;

use Limpeza;

create table Cliente (
ID_Cliente int,
Telefone varchar(18),
Email varchar(255),
CNPJ_CPF varchar(100),
Nome_Cliente varchar(100)
);

create table Manutenção(
ID_Ordem int,
ID_Cliente int,
Data_Manutencao date,
Endereço varchar(255),
Tipo_Manutencao varchar(255)
);

create table Funcionario(

Nome_Funcionario varchar(100),
CPF varchar(100),
Salario decimal,
ID_Funcionario int,
Setor varchar(50)
);

create table Limpeza(
ID_Limpeza int,
Funcionarios varchar(1000),
Data_Limpeza date,
Endereço varchar(255),
Tipo_Limpeza varchar(100)
);

create table Vendas(
ID_Venda int,
Quantidade int,
Data_Compra date,
ID_Cliente int,
Preço decimal
);

create table Produto(
ID_Produto int,
Quantidade int,
Nome_Produto varchar(255),
Valor decimal,
Descricao varchar(255)
)