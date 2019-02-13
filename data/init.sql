CREATE DATABASE form;

use form;

CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(25),
	surname VARCHAR(25),
	sex VARCHAR(10),
	age VARCHAR(3),
	email VARCHAR(50),
	young VARCHAR(25),
	birthday VARCHAR(10),
	marital_status VARCHAR(25),
	domicile VARCHAR(50),
	profession VARCHAR(25),
  weekend VARCHAR(50),
  country VARCHAR(50),
  number_of_books VARCHAR(10),
  comment VARCHAR(200),
  feedback VARCHAR(30),
  field  VARCHAR(50),
  learn_english VARCHAR(50),
  garden VARCHAR(50),
  make_money VARCHAR(50),
  complexity VARCHAR(15)
);