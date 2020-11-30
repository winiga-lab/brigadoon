CREATE DATABASE IF NOT EXISTS brigadoondb;

/*User recommanded for the app */
CREATE USER IF NOT EXISTS 'database_admin'@'%' IDENTIFIED BY 'msnorgandeal';
GRANT ALL ON brigadoondb.* TO 'database_admin'@'%';

CREATE USER IF NOT EXISTS 'app_admin'@'%' IDENTIFIED BY 'msnorgandeal';
GRANT SELECT, INSERT, UPDATE, DELETE ON brigadoondb.* TO 'app_admin'@'%';

USE brigadoondb;

/*table creation */ 


CREATE TABLE IF NOT EXISTS adresse
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    code_postal CHAR(7) NOT NULL,
    num_immo CHAR(3),
    nom_rue VARCHAR(16),
    nom_ville VARCHAR(32)
);

CREATE TABLE IF NOT EXISTS personne
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(32) NOT NULL, 
    prenom VARCHAR(64) NOT NULL,
    sexe CHAR(1) NOT NULL, 
    dte_naiss DATE NOT NULL, 
    profil CHAR(10) NULL, 
    bio VARCHAR(255) NOT NULL,
    adresse_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NULL,
    CONSTRAINT FK_personne_adresse FOREIGN KEY (adresse_id) REFERENCES adresse(id)
);

CREATE TABLE IF NOT EXISTS etablissement
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    raison_sociale VARCHAR(32) NOT NULL,
    info_generale VARCHAR(250) NULL,
    administrateur INT NOT NULL,
    adresse_id INT NOT NULL,
    CONSTRAINT FK_etablissement_personne FOREIGN KEY (administrateur) REFERENCES personne(id),
    CONSTRAINT FK_etablissement_adresse FOREIGN KEY (adresse_id) REFERENCES adresse(id)
);

CREATE TABLE IF NOT EXISTS logins
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_utilisateur VARCHAR(32) NOT NULL,
    mp_salt CHAR(16) NULL,
    mp_hash CHAR(16) NULL,
    personne_id INT NOT NULL,
    CONSTRAINT FK_logins_personne FOREIGN KEY (personne_id) REFERENCES personne(id)
);

CREATE TABLE IF NOT EXISTS compte
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS memberships
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    personne_id INT NOT NULL,
    compte_id INT NOT NULL,
    CONSTRAINT FK_memberships_personne FOREIGN KEY (personne_id) REFERENCES personne(id),
    CONSTRAINT FK_memberships_compte FOREIGN KEY (compte_id) REFERENCES compte(id)
);

CREATE TABLE IF NOT EXISTS diplome
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre varchar(32) NOT NULL,
    grade CHAR(10) NULL
);

CREATE TABLE IF NOT EXISTS diplomer
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    personne_id INT NOT NULL,
    diplome_id INT NOT NULL,
    CONSTRAINT FK_diplomer_personne FOREIGN KEY (personne_id) REFERENCES personne(id),
    CONSTRAINT FK_diplomer_diplome FOREIGN KEY (diplome_id) REFERENCES diplome(id)
);

CREATE TABLE IF NOT EXISTS offre
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    libelle VARCHAR(32) NOT NULL,
    description VARCHAR(255) NULL,
    date_publication DATETIME NOT NULL,
    date_expiration DATETIME NULL,
    etablissement_id INT NOT NULL,
    CONSTRAINT FK_offre_etablissement FOREIGN KEY (etablissement_id) REFERENCES etablissement(id)
);

CREATE TABLE IF NOT EXISTS noter
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    note INT NOT NULL,
    noteur INT NOT NULL,
    notee INT NOT NULL,
    CONSTRAINT FK_noteur_memberships FOREIGN KEY (noteur) REFERENCES memberships(id),
    CONSTRAINT FK_noter_memberships FOREIGN KEY (notee) REFERENCES memberships(id)
)




