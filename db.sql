Use gestionpersonne;

create TABLE Users(
    IdUser int AUTO_INCREMENT,
    UserName varchar(50),
    Pass varchar(50),
    PRIMARY KEY (IdUser)
);

create Table Niveau(
	IdNiveau int AUTO_INCREMENT,
    IntituleNiveau varchar(50),
    PRIMARY KEY (IdNiveau)
);

create Table Personne(
    IdPersonne Int AUTO_INCREMENT,
    Nom varchar(50),
    Prenom varchar(50),
    Adresse varchar(50),
    DateN date,
    tel varchar(50),
    Email varchar(50),
    IdNiveau int,
    PRIMARY KEY (IdPersonne),
    FOREIGN KEY (IdNiveau) REFERENCES Niveau(IdNiveau)
);

create Table Formation(
    IdFormation Int AUTO_INCREMENT,
    IntituleFormation varchar(50),
    Ecole varchar(50),
    DateDebut date,
    DateFin date,
    IdPersonne Int,
    PRIMARY KEY (IdFormation),
    FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
);
create Table Competance(
    IdCompetance Int AUTO_INCREMENT,
    IntituleCompetance varchar(50),
    IdPersonne Int,
    PRIMARY KEY (IdCompetance),
    FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
);

insert into Users (UserName,Pass) VALUES('admin','admin');

