CREATE USER IF NOT EXISTS 'root'@'localhost' IDENTIFIED BY 'p@ssword';
GRANT ALL PRIVILEGES ON * . * TO 'root'@'localhost';

CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY 'p@ssword';
GRANT ALL PRIVILEGES ON * . * TO 'root'@'%';
alter user 'root'@'%' identified with mysql_native_password by 'p@ssword';

DROP DATABASE IF EXISTS social_game;
CREATE DATABASE IF NOT EXISTS social_game;

use social_game;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(16) NOT NULL
);

insert into users (user_name) values ("Sato");
insert into users (user_name) values ("Suzuki");
insert into users (user_name) values ("Takahashi");

DROP TABLE IF EXISTS cards;
CREATE TABLE IF NOT EXISTS cards (
    card_id INT AUTO_INCREMENT PRIMARY KEY,
    card_rarity VARCHAR(255) NOT NULL,
    card_name VARCHAR(255) NOT NULL,
    attack INT NOT NULL,
    defense INT NOT NULL,
    cost INT NOT NULL
);

insert into cards (card_rarity, card_name, attack, defense, cost) values ("common", "Tank", 10, 25, 3);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("uncommon", "Tank", 15, 40, 4);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("rare", "Tank", 20, 60, 5);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("common", "Attacker", 20, 10, 2);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("uncommon", "Attacker", 35, 15, 3);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("rare", "Attacker", 50, 20, 4);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("common", "Thief", 10, 10, 1);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("uncommon", "Thief", 15, 15, 2);
insert into cards (card_rarity, card_name, attack, defense, cost) values ("rare", "Thief", 20, 25, 2);


DROP TABLE IF EXISTS user_cards;
CREATE TABLE IF NOT EXISTS user_cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    card_id INT NOT NULL,
    deck_id BOOLEAN NOT NULL
);

DROP TABLE IF EXISTS user_decks;
CREATE TABLE IF NOT EXISTS user_decks (
    user_id INT NOT NULL,
    deck_id INT NOT NULL,
    user_card_id INT NOT NULL
);

DROP TABLE IF EXISTS card_gacha;
CREATE TABLE IF NOT EXISTS card_gacha (
    gacha_id INT NOT NULL,
    card_id INT NOT NULL,
    weight_num INT NOT NULL
);

insert into card_gacha (gacha_id, card_id, weight_num) values (1, 1, 100);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 2, 50);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 3, 10);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 4, 100);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 5, 50);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 6, 10);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 7, 100);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 8, 50);
insert into card_gacha (gacha_id, card_id, weight_num) values (1, 9, 10);

DROP TABLE IF EXISTS gacha_history;
CREATE TABLE IF NOT EXISTS gacha_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    history_id INT NOT NULL,
    gacha_id INT NOT NULL,
    card_id INT NOT NULL
);