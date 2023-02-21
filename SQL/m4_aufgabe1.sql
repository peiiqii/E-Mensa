USE emensawerbeseite;

DROP TABLE wunschgericht;
CREATE TABLE IF NOT EXISTS wunschgericht (
     name VARCHAR(80),
     beschreibung VARCHAR(800),
     erstellungsdatum DATE,
     nummer bigint AUTO_INCREMENT NOT NULL PRIMARY KEY ,
     ersteller_name VARCHAR(80) DEFAULT 'anonym',
     email VARCHAR(200)
)

SELECT * FROM wunschgericht LIMIT 5;