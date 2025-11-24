CREATE DATABASE CURSOS;
USE CURSOS;


CREATE TABLE CURSOS (
carga_horaria varchar(20),
modelo varchar(50),
descricao varchar(255),
status VARCHAR(255) DEFAULT 'Ativo' CHECK (Status IN ('Ativo', 'Inativo')),
id_curso int not null  auto_increment PRIMARY KEY
);

CREATE TABLE INSCRICOES (
data_inscricao date not null,
id_inscricao int not null  auto_increment PRIMARY KEY,
id_aluno int not null
);

CREATE TABLE AVALIÇAO (
comentario varchar(255),
id_avaliacao int not null  auto_increment PRIMARY KEY,
nota Decimal (5,2),
id_inscricao int not null,
FOREIGN KEY(id_inscricao) REFERENCES INSCRICOES (id_inscricao)
);

CREATE TABLE ALUNOS (
data_nascimento date not null,
id_aluno int not null  auto_increment PRIMARY KEY,
nome_aluno varchar(255),
email varchar(255)  not null
);

CREATE TABLE MATRICULADO (
id_curso int not null,
id_inscricao int not null ,
FOREIGN KEY(id_curso) REFERENCES CURSOS (id_curso),
FOREIGN KEY(id_inscricao) REFERENCES INSCRICOES (id_inscricao)
);

ALTER TABLE INSCRICOES ADD FOREIGN KEY(id_aluno) REFERENCES ALUNOS (id_aluno);

-- CURSOS
INSERT INTO CURSOS (carga_horaria, modelo, descricao, status) VALUES
('40h', 'Matemática Básica', 'Curso introdutório de matemática', 'Ativo'),
('60h', 'Programação em Python', 'Curso de programação para iniciantes', 'Inativo'),
('30h', 'Inglês Básico', 'Curso básico de inglês', 'Inativo'),
('45h', 'História do Brasil', 'Curso sobre história do Brasil', 'Ativo'),
('50h', 'Introdução à Física', 'Conceitos básicos de física', 'Ativo');

-- ALUNOS
INSERT INTO ALUNOS (data_nascimento, nome_aluno, email) VALUES
('2000-01-15', 'Ana Silva', 'ana.silva@email.com'),
('1998-06-22', 'Bruno Souza', 'bruno.souza@email.com'),
('2001-11-05', 'Carla Pereira', 'carla.pereira@email.com'),
('1995-03-30', 'Daniel Oliveira', 'daniel.oliveira@email.com'),
('1999-09-18', 'Elisa Fernandes', 'elisa.fernandes@email.com');

-- INCRIÇOES
INSERT INTO INSCRICOES (data_inscricao, id_aluno) VALUES
('2024-01-10', 1),
('2024-02-15', 2),
('2024-03-01', 3),
('2024-04-20', 4),
('2024-05-05', 5);

-- AVALIAÇOES
INSERT INTO AVALIÇAO (comentario, nota, id_inscricao) VALUES
('Excelente curso, aprendi muito.', 9.5, 1),
('Conteúdo muito bom, mas poderia ter mais exercícios.', 8.0, 2),
('Gostei do curso, mas a didática poderia melhorar.', 7.5, 3),
('Curso muito informativo e bem estruturado.', 9.0, 4),
('Tive algumas dificuldades, mas recomendo.', 7.0, 5);

-- MATRICULA
INSERT INTO MATRICULADO (id_curso, id_inscricao) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);


SELECT * FROM CURSOS;
SELECT * FROM ALUNOS;
SELECT * FROM INSCRICOES;
SELECT * FROM AVALIÇAO;
SELECT * FROM MATRICULADO;

UPDATE ALUNOS
SET email = 'elisa.Oliveira@email.com'
WHERE id_aluno = 3;


UPDATE Cursos
SET carga_horaria = 50
WHERE id_curso = 1;


UPDATE ALUNOS
SET nome_aluno = 'Elisa Oliveira'
WHERE id_aluno = 5;


UPDATE CURSOS
SET STATUS = Ativo
WHERE id_curso = 2;

UPDATE AVALIAÇAO
SET nota = 8.00
WHERE id_incriçao = 3;

-- DELETE
DELETE FROM Inscricoes
WHERE Id_Inscricao = 4;

DELETE FROM Inscricoes
WHERE Curso_Id = 4;

DELETE FROM Curso
WHERE Id_Curso = 4;

DELETE FROM Avaliacoes
WHERE Id_Avaliacao = 3;

DELETE FROM Avaliacoes
WHERE Inscricao_Id IN (SELECT Id_Inscricao FROM Inscricoes WHERE Aluno_Id = 5);

DELETE FROM Inscricoes
WHERE Aluno_Id = 5;

DELETE FROM Aluno
WHERE Id_Aluno = 5;


