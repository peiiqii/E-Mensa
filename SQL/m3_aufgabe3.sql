-- A3.1
SELECT * FROM gericht;

-- A3.2
SELECT erfasst FROM gericht;

-- A3.3
SELECT erfasst, name AS Gerichtname FROM gericht ORDER BY name DESC;

-- A3.4
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;

-- A3.5
SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 10 OFFSET 5;

-- A3.6
SELECT DISTINCT type FROM allergen;

-- A3.7
SELECT name FROM gericht WHERE name LIKE 'K%';

-- A3.8
SELECT name, id FROM gericht WHERE name LIKE '%suppe%';

-- A3.9
SELECT * FROM kategorie WHERE eltern_id IS NULL;

-- A3.10
UPDATE allergen SET name = 'Kamut' WHERE allergen.code = 'a6';

-- A3.11
INSERT INTO gericht(id, name, beschreibung, erfasst, preis_intern, preis_extern) values (21,'currywurst mit pommes','currywurst mit kartoffel gebraten',now(),1,2);



