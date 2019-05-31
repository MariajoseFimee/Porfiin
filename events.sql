DROP DATABASE IF EXISTS events;
CREATE DATABASE events;
USE events;

CREATE TABLE artist
(
artist_id INT  NOT NULL AUTO_INCREMENT,
descr NVARCHAR(30) NOT NULL,
PRIMARY KEY(artist_id)
);
INSERT INTO artist (descr) VALUES ('Zoé');
INSERT INTO artist (descr) VALUES ('Caifanes');
INSERT INTO artist (descr) VALUES ('CaféTacvba');
INSERT INTO artist (descr) VALUES ('DLD');
INSERT INTO artist (descr) VALUES ('Los Claxons');
INSERT INTO artist (descr) VALUES ('La Gusana Ciega');
INSERT INTO artist (descr) VALUES ('Fobia');
INSERT INTO artist (descr) VALUES ('Siddhartha');
INSERT INTO artist (descr) VALUES ('Natalia Lafourcade');
INSERT INTO artist (descr) VALUES ('Ximena Sariñana');
INSERT INTO artist (descr) VALUES ('Daddy Yankee');
INSERT INTO artist (descr) VALUES ('Maluma');
INSERT INTO artist (descr) VALUES ('Nicky Jam');
INSERT INTO artist (descr) VALUES ('J Balvin');
INSERT INTO artist (descr) VALUES ('Bad Bunny');
INSERT INTO artist (descr) VALUES ('Ozuna');
INSERT INTO artist (descr) VALUES ('Piso 21');
INSERT INTO artist (descr) VALUES ('Manuel Turizo');
INSERT INTO artist (descr) VALUES ('Sebastián Yatra');
INSERT INTO artist (descr) VALUES ('Natti Natasha');
INSERT INTO artist (descr) VALUES ('Karol G');
INSERT INTO artist (descr) VALUES ('Don Omar');
INSERT INTO artist (descr) VALUES ('Manuel Medrano');
INSERT INTO artist (descr) VALUES ('Carlos RIvera');
INSERT INTO artist (descr) VALUES ('Alejandro Fernández');
INSERT INTO artist (descr) VALUES ('Luis Miguel');
INSERT INTO artist (descr) VALUES ('Andrés Calamaro');
INSERT INTO artist (descr) VALUES ('Kalimba');
INSERT INTO artist (descr) VALUES ('Bunbury');
INSERT INTO artist (descr) VALUES ('Emmanuel');
INSERT INTO artist (descr) VALUES ('Los Ángeles Azules');
INSERT INTO artist (descr) VALUES ('Bronco');
INSERT INTO artist (descr) VALUES ('Tigres del Norte');
INSERT INTO artist (descr) VALUES ('Intocable');
INSERT INTO artist (descr) VALUES ('Yuridia');

CREATE TABLE day (
day_id INT NOT NULL AUTO_INCREMENT,
name_day NVARCHAR(50) NOT NULL,
PRIMARY KEY(day_id)
);
INSERT INTO day (name_day) VALUES ('Viernes 19 de Marzo 2020');
INSERT INTO day (name_day) VALUES ('Sábado 20 de Marzo 2020');
INSERT INTO day (name_day) VALUES ('Domingo 21 de Marzo 2020');
INSERT INTO day (name_day) VALUES ('Todos');

CREATE TABLE horario(
hora_id INT NOT NULL AUTO_INCREMENT,
descr NVARCHAR(10) NOT NULL,
PRIMARY KEY (hora_id)
);
INSERT INTO horario(descr)VALUES('17:00');
INSERT INTO horario(descr)VALUES('18:00');
INSERT INTO horario(descr)VALUES('19:00');
INSERT INTO horario(descr)VALUES('20:00');
INSERT INTO horario(descr)VALUES('21:00');
INSERT INTO horario(descr)VALUES('22:00');
INSERT INTO horario(descr)VALUES('23:00');
INSERT INTO horario(descr)VALUES('00:00');

CREATE TABLE stage (
stage_id INT NOT NULL AUTO_INCREMENT,
stage_name NVARCHAR(50) NOT NULL,
PRIMARY KEY(stage_id)
);
INSERT INTO stage (stage_name) VALUES ('Escenario Latin Live');
INSERT INTO stage (stage_name) VALUES ('Escenario VIVE');
INSERT INTO stage (stage_name) VALUES ('Escenario Coca Cola');

CREATE TABLE users (
users_id INT NOT NULL AUTO_INCREMENT,
user_name NVARCHAR(50) NOT NULL,
passwords NVARCHAR(50) NOT NULL,
UNIQUE(user_name),
PRIMARY KEY(users_id)
);
INSERT INTO users (user_name, passwords) VALUES ('MajoU',1234);
INSERT INTO users (user_name, passwords) VALUES ('AdriU',1234);
INSERT INTO users (user_name, passwords) VALUES ('RochaU',1234);
INSERT INTO users (user_name, passwords) VALUES ('AlanU',1234);
INSERT INTO users (user_name, passwords) VALUES ('MarioU',1234);


CREATE TABLE itinerary (
itinerary_id INT NOT NULL AUTO_INCREMENT,
artist_id INT NOT NULL,
stage_id INT NOT NULL,
day_id INT NOT NULL,
hora_id INT NOT NULL,
PRIMARY KEY(itinerary_id),
FOREIGN KEY (artist_id) REFERENCES artist(artist_id),
FOREIGN KEY (stage_id) REFERENCES stage(stage_id),
FOREIGN KEY (day_id) REFERENCES day(day_id),
FOREIGN KEY (hora_id) REFERENCES horario(hora_id)
);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (1,1,1,5);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (2,2,1,6);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (3,3,1,7);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (13,1,2,3);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (14,2,2,4);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (15,3,2,7);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (25,1,3,2);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (26,2,3,5);
INSERT INTO itinerary (artist_id, stage_id, day_id,hora_id) VALUES (32,3,3,8);

CREATE TABLE meet (
meet_id INT NOT NULL AUTO_INCREMENT,
artist_id INT NOT NULL,
stage_id INT NOT NULL ,
day_id INT NOT NULL,
hora_id INT NOT NULL,
PRIMARY KEY(meet_id),
FOREIGN KEY (artist_id) REFERENCES artist(artist_id),
FOREIGN KEY (stage_id) REFERENCES stage(stage_id),
FOREIGN KEY (day_id) REFERENCES day(day_id),
FOREIGN KEY (hora_id) REFERENCES horario(hora_id)
);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (4,1,1,1);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (5,2,1,2);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (6,3,1,3);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (16,1,2,1);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (17,2,2,2);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (18,3,2,3);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (24,2,3,4);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (25,1,3,5);
INSERT INTO meet (artist_id, stage_id,day_id,hora_id) VALUES (29,1,3,6);

CREATE TABLE meet_user (
meet_user_id INT NOT NULL AUTO_INCREMENT,
users_id INT NOT NULL,
meet_id INT NOT NULL,
PRIMARY KEY(meet_user_id),
FOREIGN KEY (users_id)REFERENCES users(users_id),
FOREIGN KEY (meet_id)  REFERENCES meet(meet_id)
);
INSERT INTO meet_user (users_id, meet_id) VALUES (1,1);
INSERT INTO meet_user (users_id, meet_id) VALUES (1,2);
INSERT INTO meet_user (users_id, meet_id) VALUES (1,3);
INSERT INTO meet_user (users_id, meet_id) VALUES (2,4);
INSERT INTO meet_user (users_id, meet_id) VALUES (2,5);
INSERT INTO meet_user (users_id, meet_id) VALUES (2,6);
INSERT INTO meet_user (users_id, meet_id) VALUES (3,7);
INSERT INTO meet_user (users_id, meet_id) VALUES (3,8);
INSERT INTO meet_user (users_id, meet_id) VALUES (3,1);
INSERT INTO meet_user (users_id, meet_id) VALUES (4,2);
INSERT INTO meet_user (users_id, meet_id) VALUES (4,4);
INSERT INTO meet_user (users_id, meet_id) VALUES (4,6);
INSERT INTO meet_user (users_id, meet_id) VALUES (5,7);
INSERT INTO meet_user (users_id, meet_id) VALUES (5,1);
INSERT INTO meet_user (users_id, meet_id) VALUES (5,6);

CREATE TABLE ticket
(
    ticket_id INT NOT NULL AUTO_INCREMENT,
    ticket_name NVARCHAR(50) NOT NULL,
    price FLOAT(6,2) NOT NULL,
    descr NVARCHAR(255) NOT NULL,
    disp INT NOT NULL,
    PRIMARY KEY(ticket_id)
);
INSERT INTO ticket (ticket_name, price, descr, disp) VALUES ('Pase por dia',800.00,'Pase para tu dia favorito, acceso a todos los escenarios',4);
INSERT INTO ticket (ticket_name, price, descr, disp) VALUES ('VIP por dia',1500.00, 'Pase para tu dia favorito, acceso a la mejor zona de todos los escenarios',100);
INSERT INTO ticket (ticket_name, price, descr, disp) VALUES ('Pase completo',2000.00,'Pase para todos los dias, acceso a todos los escenarios',2000);
INSERT INTO ticket (ticket_name, price, descr, disp) VALUES ('Pase completo VIP',3750.00,'Pase para todos los dias, acceso a la mejor zona de todos los escenarios',200);
INSERT INTO ticket (ticket_name, price, descr, disp) VALUES ('Meet&Greet',4500.00,'Pase para conocer y convivir con tu artista favorito',50);

CREATE TABLE history (
history_id INT NOT NULL AUTO_INCREMENT,
users_id INT NOT NULL,
ticket_id INT NOT NULL,
day_id INT NOT NULL,
PRIMARY KEY(history_id),
FOREIGN KEY (users_id) REFERENCES users(users_id),
FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id),
FOREIGN KEY (day_id)  REFERENCES day(day_id)
);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (1,1,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (1,2,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (1,2,1);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (2,3,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (2,4,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (2,4,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (3,2,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (3,2,2);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (3,3,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (4,4,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (4,3,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (4,1,2);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (5,2,3);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (5,3,4);
INSERT INTO history (users_id, ticket_id, day_id) VALUES (5,2,1);

CREATE TABLE admins (
admins_id INT NOT NULL AUTO_INCREMENT,
admin_name NVARCHAR(50) NOT NULL,
passwords NVARCHAR(50) NOT NULL,
PRIMARY KEY(admins_id)
);
INSERT INTO admins(admin_name, passwords) VALUES('Majo',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Adriana',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Rochi',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Alan',1234);
INSERT INTO admins(admin_name, passwords) VALUES('Mario',1234);

/********************VISTAS*************************/

CREATE VIEW itinerary_view AS
SELECT i.itinerary_id AS 'platano',
a.descr AS 'azul',
s.stage_name AS 'verde',
d.name_day AS 'rojo',
h.descr AS 'hora'
FROM artist a
INNER JOIN itinerary i
ON a.artist_id = i.artist_id
INNER JOIN stage s
ON s.stage_id = i.stage_id
INNER JOIN day d
ON d.day_id = i.day_id
INNER JOIN horario h
ON h.hora_id=i.hora_id;

CREATE VIEW history_view AS 
SELECT h.history_id AS '#',
u.user_name AS 'Nombre',
t.ticket_name AS 'Descripción',
t.price AS 'Precio'
FROM users u
INNER JOIN history h
ON u.users_id = h.users_id
INNER JOIN ticket t
ON h.ticket_id = t.ticket_id;

CREATE VIEW u_history_view AS 
SELECT h.history_id AS 'hid',
u.users_id AS 'id',
u.user_name AS 'Nombre',
t.ticket_name AS 'Descr',
d.name_day AS 'Dia',
t.price AS 'Precio'
FROM users u
INNER JOIN history h
ON u.users_id = h.users_id
INNER JOIN ticket t
ON h.ticket_id = t.ticket_id
INNER JOIN day d
ON d.day_id = h.day_id;

CREATE VIEW meet_view AS
SELECT m.meet_id AS 'IDM',
d.day_id AS 'ID',
a.descr AS 'adriana',
s.stage_name AS 'sebas',
d.name_day AS 'tian',
h.descr AS 'hhh'
FROM artist a
INNER JOIN meet m
ON a.artist_id = m.artist_id
INNER JOIN stage s
ON s.stage_id = m.stage_id
INNER JOIN day d
ON d.day_id = m.day_id
INNER JOIN horario h
ON h.hora_id=m.hora_id;

CREATE VIEW meet_view_user AS
SELECT mu.meet_user_id AS 'id_meet_user',
u.user_name AS 'usuario',
a.descr AS 'Famoso',
s.stage_name AS 'escenario',
d.name_day AS 'dia',
u.users_id AS 'id',
h.descr AS 'hrs'
FROM meet_user mu
INNER JOIN meet m
ON mu.meet_id = m.meet_id
INNER JOIN users u
ON mu.users_id = u.users_id
INNER JOIN artist a
ON m.artist_id = a.artist_id
INNER JOIN stage s
ON m.stage_id = s.stage_id
INNER JOIN day d
ON m.day_id = d.day_id
INNER JOIN horario h
ON h.hora_id =m.hora_id;