USE pratica_um;

CREATE TABLE Cliente (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Telefone VARCHAR(15)
);

CREATE TABLE Colaborador (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Chamado (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_Cliente INT,
    Descricao TEXT NOT NULL,
    Criticidade ENUM('baixa', 'média', 'alta') NOT NULL,
    Status ENUM('aberto', 'em andamento', 'resolvido') DEFAULT 'aberto',
    Data_Abertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    ID_Colaborador INT,
    FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID),
    FOREIGN KEY (ID_Colaborador) REFERENCES Colaborador(ID)
);