CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  user_password varchar(255) NOT NULL,
  user_type enum('doctor','patient') NOT NULL,
  user_name varchar(100) NOT NULL,
  email varchar(100) NOT NULL
);