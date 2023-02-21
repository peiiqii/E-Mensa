-- A4.1
alter table gericht_hat_kategorie add constraint einzigartig unique (gericht_id,kategorie_id);

-- A4.2
alter table gericht add index index_gericht (name);

-- A4.3
alter table gericht_hat_kategorie add constraint kategoriedel foreign key (gericht_id) references gericht(id) on delete cascade;
alter table gericht_hat_allergen add constraint allergendel foreign key (gericht_id) references gericht(id) on delete cascade;

-- A4.4
alter table kategorie add constraint kategoriebaum foreign key (eltern_id) references kategorie(id) on delete restrict;
alter table gericht_hat_kategorie add constraint kategorie foreign key (kategorie_id) references  kategorie(id) on delete restrict;

-- A4.5
alter table gericht_hat_allergen add constraint allergencode foreign key (code) references allergen(code) on update cascade;

-- A4.6
alter table gericht_hat_kategorie add constraint primarykey primary key (gericht_id,kategorie_id);


