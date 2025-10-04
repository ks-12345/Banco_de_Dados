create database Pizzaria;

use Pizzaria;

create table Cliente(
ID_Cliente int,
Forma_Pagamento varchar(255),
Telefone int(11),
Enderenço varchar(255),
CPF int(8),
Nome_Cliente  varchar(255)
);

create table Funcionario(
ID_Funcionario int,
Salario int(8),
Funçao varchar(255),
Data_Nascimento int(11),
Nome_Funcionari varchar(255)
);

create table Cardapio(
ID_Pizza int,
Ingredientes_Pizza varchar(255),
Valor_Pizza int(11),
Sabor_Pizza varchar(255)
);

create table Estoque(
ID_Estoque int,
Data_Saida int,
Data_Entrada int,
Quantidade int(11),
Ingredientes varchar(255)
);

create table Vendas(
ID_Pedidos int,
Valor_Pedidos int(11),
Forma_Pagamento int,
Total int,
Ingredientes varchar(255)
);
