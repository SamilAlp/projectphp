#Maken databse projectphp
create database projectphp;

 

#Gebruik projectphp
use projectphp;

#Maken table account
CREATE TABLE account ( 
  id INT NOT NULL AUTO_INCREMENT,
  acount_id INT NOT NULL,
  email VARCHAR(75) UNIQUE,
  password varchar(15),
  lostpassword varchar(15),
  PRIMARY KEY(id)
);

 INSERT INTO account (email, wachtwoord, wachtwoordvergeten)
 values('samilalparsan@hotmail.com', 'Alparslan1', NULL);


#Maken table persoon
CREATE TABLE persoon(
   id INT NOT NULL AUTO_INCREMENT,
   account_id INT NOT NULL,
   voornaam  varchar(15) NOT NULL,
   achtenaam  varchar(15) NOT NULL,
   tussenvoegsel  varchar(15),
   geboortedatum date NOT NULL,
   gebruiksnaam  varchar(15) NOT NULL UNIQUE,
   FOREIGN KEY (account_id) REFERENCES account(id),
   PRIMARY KEY (id)
);

 INSERT INTO persoon (voornaam, achternaam, tussenvoegsel, geboortedatum, gebruiksnaam)
 values('Samil', 'Alparslan', NULL, date(12-12-2204), 'admin');


