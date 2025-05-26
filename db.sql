
--- INITIAL STATE

CREATE TABLE users (
    id serial PRIMARY KEY,
    username varchar(16) NOT NULL UNIQUE,
    plaintext_password varchar(512) NOT NULL,
    is_admin bool NOT NULL
);
INSERT INTO users (username,plaintext_password,is_admin) VALUES ('admin','admin',true);
INSERT INTO users (username,plaintext_password,is_admin) VALUES ('Guzio','test1',true);
INSERT INTO users (username,plaintext_password,is_admin) VALUES ('Jifo','test2',false);
INSERT INTO users (username,plaintext_password,is_admin) VALUES ('Michau','test3',false);

CREATE TABLE mods (
    id serial PRIMARY KEY,
    added_by integer REFERENCES users ON DELETE SET NULL,
    mod_display_name varchar(512) NOT NULL,
    extra_text text
);
INSERT INTO mods (added_by,mod_display_name) VALUES (2,'Applied Energistics 2');
INSERT INTO mods (added_by,mod_display_name) VALUES (4,'Create');
INSERT INTO mods (added_by,mod_display_name,extra_text) VALUES (3,'Flywheel','Naprawia błąd: Create nie może znaleźć dependencji.');
INSERT INTO mods (added_by,mod_display_name) VALUES (3,'Sodium');
INSERT INTO mods (added_by,mod_display_name,extra_text) VALUES (2,'Lithium','Skoro dodajemy Sodium, to wypadałoby od razu dodać jego kuzyna.');

CREATE TABLE feedbacks (
    text_content text,
    rating integer CHECK (rating > 0 AND rating < 6), -- Od 1 do 5 gwiazdek
    posted_by integer NOT NULL REFERENCES users ON DELETE CASCADE,
    mod_id integer NOT NULL REFERENCES mods ON DELETE CASCADE,
    PRIMARY KEY(mod_id, posted_by)
);
INSERT INTO feedbacks (rating,posted_by,mod_id,text_content) VALUES (5,2,2,'OMG, POCIĄGI!');
INSERT INTO feedbacks (rating,posted_by,mod_id) VALUES (2,3,2);
INSERT INTO feedbacks (rating,posted_by,mod_id,text_content) VALUES (4,2,4,'Imo Vulkan Mod lepszy, no ale niestety nie działa z Create.');
INSERT INTO feedbacks (posted_by,mod_id,text_content) VALUES (4,3,'sry, zapomniałem dodać');

CREATE TABLE dependencies (
    parent_id integer NOT NULL REFERENCES mods ON DELETE RESTRICT,
    child_id integer NOT NULL REFERENCES mods ON DELETE CASCADE,
    PRIMARY KEY(parent_id, child_id)
);
INSERT INTO dependencies (parent_id,child_id) VALUES (3,2);

CREATE FUNCTION avg_rating(int) RETURNS numeric(3,2) LANGUAGE plpgsql AS $$
    DECLARE
    counted_avg numeric(3,2);
    rating_count int;
    BEGIN
        SELECT count(rating) INTO rating_count FROM feedbacks WHERE mod_id=$1;
        IF rating_count < 1 THEN
            RETURN NULL;
        ELSE
            SELECT AVG(rating)::numeric(3,2) INTO counted_avg FROM feedbacks WHERE mod_id=$1;
        END IF;
        RETURN counted_avg;
    END;
$$;

CREATE VIEW readable_feedbacks AS SELECT mods.mod_display_name,users.username,feedbacks.rating,feedbacks.text_content FROM feedbacks,users,mods WHERE mods.id = feedbacks.mod_id AND users.id = feedbacks.posted_by;
CREATE VIEW readable_mods AS SELECT mods.mod_display_name,users.username,avg_rating(mods.id),mods.extra_text FROM users,mods WHERE users.id = mods.added_by;



--- TEST

-----> Print all:
SELECT * FROM users;
SELECT * FROM mods;
SELECT * FROM feedbacks;
SELECT * FROM dependencies;
SELECT * FROM readable_feedbacks;
SELECT * FROM readable_mods;
SELECT avg_rating(0);
SELECT avg_rating(1);
SELECT avg_rating(2);
SELECT avg_rating(3);
SELECT avg_rating(4);
SELECT avg_rating(5);
SELECT avg_rating(6);

-----> Miało być więcej testów (gł. związanych z usuwaniem danych (sprawdzanie, czy ON DELETE działa dobrze) oraz tworzeniem nowych wierszy (sprawdanie, czy ograniczenia dobrze działają)), ale jest 6:18, a ja wciąż nie mam interfejsu PHP, więc chyba sobie daruję te więcej testów. Będzie „Wielka Improwizacja” na oddawaniu, ig! Na żywca będą mi musiały przeychodzić do głowy testy.



--- CLEANUP

DROP VIEW readable_mods,readable_feedbacks;
DROP FUNCTION avg_rating;
DROP TABLE dependencies,feedbacks,mods,users;