CREATE DATABASE Exemplo3;

USE Exemplo3;

CREATE TABLE cliente (
    cod_cliente INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome_cliente VARCHAR(100) NOT NULL,
    CPF_cliente VARCHAR(100) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    estado CHAR(2) DEFAULT 'SP',
    celular VARCHAR(19) NOT NULL
);

CREATE TABLE produto (
    cod_produto INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome_produto VARCHAR(255) NOT NULL,
    valor DECIMAL(5,2) NOT NULL,
    descricao VARCHAR(255),
    qtde INT
);

CREATE TABLE fornecedor (
    cod_fornecedor INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome_fornecedor VARCHAR(100) NOT NULL,
    CNPJ VARCHAR(18) NOT NULL,
    celular VARCHAR(19) NOT NULL,
    endereco VARCHAR(100) NOT NULL
);

CREATE TABLE tem (
    cod_tem INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    cod_fornecedor INT,
    cod_produto INT,
    FOREIGN KEY (cod_produto) REFERENCES produto(cod_produto),
    FOREIGN KEY (cod_fornecedor) REFERENCES fornecedor(cod_fornecedor)
);

select * from cliente;

alter table cliente 
rename to Pessoa_Fisica;

alter Table Pessoa_Fisica
change CPF_cliente CPFP varchar(18);

alter Table Pessoa_Fisica
modify column Nome_cliente varchar(150);

alter Table Pessoa_Fisica
modify column estado char(2) default "MG";

alter table Pessoa_Fisica
add Cidade char (20);

alter table fornecedor
add Cidade char (20);



