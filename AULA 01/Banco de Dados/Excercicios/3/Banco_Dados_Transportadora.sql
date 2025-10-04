Create Database Trasportadora;

use Trasportadora;

Create table Cliente(
Telefone varchar(18),
Nome_Cliente varchar(100),
CNPJ_CPF varchar(100),
Email varchar(255),
ID_Cliente int,
Endereço varchar(255)
);

Create table Funcionario(
ID_Funcionario int,
Nome_Funcionario varchar(100),
Setor varchar(50),
CPF varchar(100),
Salario decimal,
Veiculo varchar(100)
);

Create table Motorista(
ID_Motorista int,
Num_Cnh varchar(100),
CATEGORIA varchar(10),
Nome_Motorista varchar(50),
ID_Funcionario date
);

Create table Veiculos(
ID_Veiculo int,
Status varchar(50),
Modelo varchar(100),
Placa varchar(10),
Marca varchar(50),
Ano date
);

Create table Pedido(
ID_Pedido int,
Data_Pedido date,
ID_Cliente int,
Endereço varchar(255),
Tipo_Pedido varchar(255),
Status varchar(50),
Nome_Cliente varchar(100)
)