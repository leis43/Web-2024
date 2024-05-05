CREATE DATABASE blog;
USE blog; 
CREATE TABLE post( 
     id INT AUTO_INCREMENT PRIMARY KEY,
     title VARCHAR(255) NOT NULL,
	 subtitle VARCHAR(255) NOT NULL,
	 content TEXT NOT NULL,
	 author VARCHAR(255),
	 author_url VARCHAR(255),
	 publish_date TIMESTAMP NOT NULL,
	 image_url VARCHAR(255) NOT NULL,
	 featured TINYINT(1) DEFAULT 0
  ); 