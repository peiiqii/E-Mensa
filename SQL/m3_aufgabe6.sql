-- A6.1
SELECT ge.name,al.name FROM (gericht_hat_allergen geh LEFT JOIN gericht ge ON geh.gericht_id=ge.id) LEFT JOIN allergen al ON al.code = geh.code;

-- A6.2
SELECT ge.name, al.name FROM (gericht ge LEFT JOIN gericht_hat_allergen geh ON ge.id=geh.gericht_id ) LEFT JOIN allergen al ON al.code = geh.code;

-- A6.3
SELECT ge.name,al.name FROM (allergen al LEFT JOIN gericht_hat_allergen geh ON al.code=geh.code) LEFT JOIN gericht ge ON ge.id = geh.gericht_id;

-- A6.4
SELECT kategorie_id,count(gericht_id) AS summe FROM gericht_hat_kategorie GROUP BY kategorie_id ORDER BY summe ASC;

-- A6.5
SELECT kategorie_id,count(gericht_id) AS summe FROM gericht_hat_kategorie GROUP BY kategorie_id HAVING summe>2 ORDER BY summe ASC;
