
CREATE database	Ferramentas;

USE Ferramentas;


CREATE TABLE Usuario (
    ID_Usuario INT NOT NULL AUTO_INCREMENT,
    Nome_Usuario VARCHAR(100) NOT NULL,
    Tipo VARCHAR(50) NOT NULL,
    Endereco VARCHAR(255),
    Email VARCHAR(100) NOT NULL,
    Telefone VARCHAR(20),
    Quantidade_Emprestimo INT NOT NULL,
    PRIMARY KEY (ID_Usuario)
);



CREATE TABLE Funcionario (
    ID_Funcionario INT NOT NULL AUTO_INCREMENT,
    ID_Usuario INT NOT NULL,
    Nome_Funcionario VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Salario DECIMAL(10, 2),
    Funcao VARCHAR(50),
    PRIMARY KEY (ID_Funcionario),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario)
);


CREATE TABLE Ferramentas (
    ID_Ferramenta INT NOT NULL AUTO_INCREMENT,
    Nome_Ferramenta VARCHAR(100) NOT NULL,
    Descricao VARCHAR(255),
    Quantidade INT NOT NULL,
    Status VARCHAR(50) NOT NULL,
    Conservacao_Ferramenta VARCHAR(50),
    PRIMARY KEY (ID_Ferramenta)
);


CREATE TABLE Reserva (
    ID_Reserva INT NOT NULL AUTO_INCREMENT,
    ID_Usuario INT NOT NULL,
    ID_Ferramenta INT NOT NULL,
    Data_Solicitacao DATETIME NOT NULL,
    Data_Retirada_Prevista DATETIME NOT NULL,
    Data_Devolucao_Prevista DATETIME,
    Quantidade INT NOT NULL,
    Status_Reserva VARCHAR(50) NOT NULL,
    PRIMARY KEY (ID_Reserva),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario),
    FOREIGN KEY (ID_Ferramenta) REFERENCES Ferramentas(ID_Ferramenta)
);


CREATE TABLE Emprestimos (
    ID_Emprestimo INT NOT NULL AUTO_INCREMENT,
    ID_Usuario INT NOT NULL,
    ID_Ferramenta INT NOT NULL,
    ID_Reserva INT,
    Nome_Solicitante VARCHAR(100),
    Nome_Ferramenta VARCHAR(100),
    Conservacao_Ferramenta VARCHAR(50),
    Quantidade INT NOT NULL,
    Data_Emprestimo DATE NOT NULL,
    Data_Devolucao DATE,
    Foto int,
    Ordem_Servico VARCHAR(50),
    PRIMARY KEY (ID_Emprestimo),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario),
    FOREIGN KEY (ID_Ferramenta) REFERENCES Ferramentas(ID_Ferramenta),
    FOREIGN KEY (ID_Reserva) REFERENCES Reserva(ID_Reserva)
);

ALTER TABLE Funcionario
ADD CONSTRAINT FK_Funcionario_Usuario
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario);


ALTER TABLE Reserva
ADD CONSTRAINT FK_Reserva_Usuario
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario);


ALTER TABLE Reserva
ADD CONSTRAINT FK_Reserva_Ferramentas
FOREIGN KEY (ID_Ferramenta) REFERENCES Ferramentas(ID_Ferramenta);


ALTER TABLE Emprestimos
ADD CONSTRAINT FK_Emprestimos_Usuario
FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario);


ALTER TABLE Emprestimos
ADD CONSTRAINT FK_Emprestimos_Ferramentas
FOREIGN KEY (ID_Ferramenta) REFERENCES Ferramentas(ID_Ferramenta);


ALTER TABLE Emprestimos
ADD CONSTRAINT FK_Emprestimos_Reserva
FOREIGN KEY (ID_Reserva) REFERENCES Reserva(ID_Reserva);