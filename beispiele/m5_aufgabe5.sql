use emensawerbeseite;
create procedure anmeldungeninkrementiert( in benutzeremail varchar(100))
begin
    declare anzahl int;
    select anzahlanmeldungen into anzahl from benutzer where email = benutzeremail ;
    set anzahl = anzahl +1;
    update benutzer set anzahlanmeldungen = anzahl where email = benutzeremail;
end;