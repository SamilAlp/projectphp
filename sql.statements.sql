#Maken databse projectphp
create database projectphp;

#Gebruik projectphp
use projectphp;

#Maken table persoon
CREATE TABLE persoon(
   id INT AUTO_INCREMENT,
   account_id INT NOT NULL,
   voornaam varchar(15),
   achtenaam varchar(15),
   tussenvoegsel varchar(15),
   gerbruiksnaam varchar(15),
   FOREIGN KEY (account_id) REFERENCES account(id),
   PRIMARY KEY (id)
);

#Maken table account
CREATE TABLE account ( 
  id INT PRIMARY KEY,
  email varchar(15) NOT NULL UNIQUE,
  password varchar(15) 
);