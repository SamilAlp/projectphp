#Maken databse projectphp
create database projectphp;

 

#Gebruik projectphp
use projectphp;

 

#Maken table persoon
CREATE TABLE persoon(
   id INT AUTO_INCREMENT,
   account_id INT NOT NULL,
   voornaam  varchar(15) NOT NULL UNIQUE,
   achtenaam  varchar(15) NOT NULL UNIQUE,
   tussenvoegsel  varchar(15) NOT NULL UNIQUE,
   geboortedatum date NOT NULL UNIQUE,
   gebruiksnaam  varchar(15) NOT NULL UNIQUE,
   FOREIGN KEY (account_id) REFERENCES account(id),
   PRIMARY KEY (id)
);

 

#Maken table account
CREATE TABLE account ( 
  id INT AUTO_INCREMENT,
  email VARCHAR(75) UNIQUE,
  password varchar(15),
  lostpassword varchar(15),
  PRIMARY KEY(id)
);