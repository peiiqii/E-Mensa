CREATE SCHEMA IF NOT EXISTS emensawerbeseite DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE emensawerbeseite;

CREATE TABLE IF NOT EXISTS gericht (
       id INT(8) PRIMARY KEY ,
       name VARCHAR(80) NOT NULL UNIQUE ,
       beschreibung VARCHAR(800) NOT NULL ,
       erfasst DATE NOT NULL ,
       vegetarisch BOOLEAN NOT NULL default false,
       vegan BOOLEAN NOT NULL default false,
       preis_intern DOUBLE NOT NULL check (preis_intern>0),
       preis_extern DOUBLE NOT NULL check (preis_extern>preis_intern)
);

CREATE TABLE IF NOT EXISTS allergen (
        code CHAR(4) PRIMARY KEY ,
        name VARCHAR(300) NOT NULL ,
        type VARCHAR(20) DEFAULT 'allergens'
);

CREATE TABLE IF NOT EXISTS kategorie (
         id  INT(8) PRIMARY KEY ,
         name VARCHAR(80) NOT NULL ,
         eltern_id INT(8) REFERENCES kategorie(id),
         bildname VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS gericht_hat_allergen (
        code CHAR(4) REFERENCES allergen(code),
        gericht_id INT(8) NOT NULL REFERENCES gericht(id)
);

CREATE TABLE IF NOT EXISTS gericht_hat_kategorie (
         gericht_id INT(8) NOT NULL REFERENCES gericht(id),
         kategorie_id INT(8) NOT NULL REFERENCES kategorie(id)
);

-- Aufgabe 2
SELECT count(*) FROM kategorie;
SELECT count(*) FROM gericht;
SELECT count(*) FROM allergen;
SELECT count(*) FROM gericht_hat_allergen;
SELECT count(*) FROM gericht_hat_kategorie;

CREATE TABLE IF NOT EXISTS kundeninfo (
       vorname VARCHAR(80),
       nachname VARCHAR(80),
       email VARCHAR(80),
       geschlecht VARCHAR(12),
       benachrichtungen VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS besucher (
      date date
);





