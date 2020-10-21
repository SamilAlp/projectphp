#Maken databse projectphp
create database projectphp;

#Gebruik projectphp
use projectphp;

CREATE TABLE usertype (
	  id INT NOT NULL AUTO_increment,
    type varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

#Maken table account
CREATE TABLE account ( 
  id INT NOT NULL AUTO_INCREMENT,
  usertype_id INT NOT NULL,
  username 	VARCHAR(255),
  email VARCHAR(75) UNIQUE,
  password varchar(15),
  FOREIGN KEY (usertype_id) REFERENCES usertype(id),
  PRIMARY KEY(id)
); 

 INSERT INTO account (email, password)
 values('samilalparsan@hotmail.com', 'Alparslan1', NULL);

#Maken table persoon
CREATE TABLE persoon(
   id INT NOT NULL AUTO_INCREMENT,
   voornaam  varchar(15) NOT NULL,
   achternaam  varchar(15) NOT NULL,
   tussenvoegsel  varchar(15),
   geboortedatum varchar NOT NULL,
   gebruiksnaam  varchar(15) NOT NULL UNIQUE,
   account_id INT NOT NULL,
   FOREIGN KEY (account_id) REFERENCES account(id),
   PRIMARY KEY (id)
);



