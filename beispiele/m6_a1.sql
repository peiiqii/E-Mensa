use emensawerbeseite;
create table if not exists Bewertungen (
       benutzer_id int(8) references benutzer(id),
       gericht_id int(8) references gericht(id),
       bemerkung varchar(800) check ( length(bemerkung)>5 ),
       sterne_bewertung varchar(200) check ( sterne_bewertung='sehr gut' or
                                             sterne_bewertung='gut' or
                                             sterne_bewertung='schlecht' or
                                             sterne_bewertung='sehr schlecht'),
       bewertung_zeitpunkt datetime,
       hervorgehoben boolean default false
);