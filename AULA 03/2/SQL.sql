
CREATE DATABASE IF NOT EXISTS empresa_fornecimentos;

USE empresa_fornecimentos;


CREATE TABLE Instituicao (
    Icodigo INT PRIMARY KEY,
    nome VARCHAR(255)
);

CREATE TABLE Fornecedor (
    Fcodigo INT PRIMARY KEY,
    Fnome VARCHAR(255),
    Status VARCHAR(50) DEFAULT 'Ativo',
    Cidade VARCHAR(255)
);



CREATE TABLE Placa (
    Pcodigo INT PRIMARY KEY,
    Pnome VARCHAR(255) NOT NULL,
    Cor VARCHAR(50) NOT NULL,
    Peso DECIMAL(10, 2) NOT NULL,
    Cidade VARCHAR(255) NOT NULL
);


CREATE TABLE Projeto (
    PRcod INT PRIMARY KEY,
    PRnome VARCHAR(255),
    Cidade VARCHAR(255),
    Icod INT,
    FOREIGN KEY (Icod) REFERENCES Instituicao(Icodigo)
);


CREATE TABLE Fornecimento (
    Fcod INT,
    Pcod INT,
    PRcod INT,
    Quantidade INT,
    PRIMARY KEY (Fcod, Pcod, PRcod),
    FOREIGN KEY (Fcod) REFERENCES Fornecedor(Fcodigo),
    FOREIGN KEY (Pcod) REFERENCES Placa(Pcodigo),
    FOREIGN KEY (PRcod) REFERENCES Projeto(PRcod)
);