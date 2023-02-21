use emensawerbeseite;
create view view_suppengerichte as select * from gericht where name like '%suppe%';
create view view_anmeldungen as select name, anzahlanmeldungen from benutzer order by anzahlanmeldungen desc ;
create  view view_kategoriegerichte_vegetarisch as select k.name as kategroiename,group_concat(v.name) as gerichtname  from kategorie as k left join gericht_hat_kategorie on k.id = gericht_hat_kategorie.kategorie_id left join (select * from gericht where vegan =true) as v on gericht_hat_kategorie.gericht_id = v.id group by k.name;