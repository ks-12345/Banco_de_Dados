-- Remove as tabelas existentes para garantir um ambiente limpo
DROP TABLE IF EXISTS Fornecimento;
DROP TABLE IF EXISTS Projeto;
DROP TABLE IF EXISTS Peca;
DROP TABLE IF EXISTS Fornecedor;
DROP TABLE IF EXISTS Instituicao;
DROP TABLE IF EXISTS Cidade;

-- Criação da tabela Cidade
CREATE TABLE Cidade (
    Ccod INT PRIMARY KEY,
    Cnome VARCHAR(255),
    uf VARCHAR(2)
);

-- Criação da tabela Fornecedor
-- Com a nova chave estrangeira para Cidade
CREATE TABLE Fornecedor (
    Fcod INT PRIMARY KEY,
    Fnome VARCHAR(255),
    Status VARCHAR(50) DEFAULT 'Ativo',
    Fone VARCHAR(20),
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da tabela Peca
-- Com a nova chave estrangeira para Cidade
CREATE TABLE Peca (
    Pcod INT PRIMARY KEY,
    Pnome VARCHAR(255) NOT NULL,
    Cor VARCHAR(50) NOT NULL,
    Peso DECIMAL(10, 2) NOT NULL,
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da tabela Projeto
-- Com a nova chave estrangeira para Cidade
CREATE TABLE Projeto (
    PRcod INT PRIMARY KEY,
    PRnome VARCHAR(255),
    Ccod INT,
    FOREIGN KEY (Ccod) REFERENCES Cidade(Ccod)
);

-- Criação da tabela Fornecimento
-- Com as chaves estrangeiras ajustadas para os nomes Fcod e Pcod
CREATE TABLE Fornecimento (
    Fcod INT,
    Pcod INT,
    PRcod INT,
    Quantidade INT,
    PRIMARY KEY (Fcod, Pcod, PRcod),
    FOREIGN KEY (Fcod) REFERENCES Fornecedor(Fcod),
    FOREIGN KEY (Pcod) REFERENCES Peca(Pcod),
    FOREIGN KEY (PRcod) REFERENCES Projeto(PRcod)
);

-- Criação de índices para otimização de consultas
CREATE INDEX idx_fornecedor_ccod ON Fornecedor (Ccod);
CREATE INDEX idx_peca_ccod ON Peca (Ccod);
CREATE INDEX idx_projeto_ccod ON Projeto (Ccod);
CREATE INDEX idx_fornecimento_fcod ON Fornecimento (Fcod);
CREATE INDEX idx_fornecimento_pcod ON Fornecimento (Pcod);
CREATE INDEX idx_fornecimento_prcod ON Fornecimento (PRcod);