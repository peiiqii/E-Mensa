ALTER TABLE gericht ADD bildname VARCHAR(200) DEFAULT NULL;

UPDATE gericht SET bildname = '01_bratkartoffel.jpg' WHERE id = 1;
UPDATE gericht SET bildname = '03_bratkartoffel.jpg' WHERE id = 3;
UPDATE gericht SET bildname = '04_tofu.jpg' WHERE id = 4;
UPDATE gericht SET bildname = '06_lasagne.jpg' WHERE id = 6;
UPDATE gericht SET bildname = '09_suppe.jpg' WHERE id = 9;
UPDATE gericht SET bildname = '10_forelle.jpg' WHERE id = 10;
UPDATE gericht SET bildname = '11_soup.jpg' WHERE id = 11;
UPDATE gericht SET bildname = '12_kassler.jpg' WHERE id = 12;
UPDATE gericht SET bildname = '13_reibekuchen.jpg' WHERE id = 13;
UPDATE gericht SET bildname = '15_pilze.jpg' WHERE id = 15;
UPDATE gericht SET bildname = '17_broetchen.jpg' WHERE id = 17;
UPDATE gericht SET bildname = '19_mousse.jpg' WHERE id = 19;
UPDATE gericht SET bildname = '20_suppe.jpg' WHERE id = 20;