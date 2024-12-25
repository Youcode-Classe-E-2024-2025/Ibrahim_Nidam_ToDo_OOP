CREATE DATABASE IF NOT EXISTS taskflow_db;

USE taskflow_db;

CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(16) NOT NULL,
  description VARCHAR(100),
  due_datetime DATETIME, 
  priority ENUM('High', 'Medium', 'Low') NOT NULL,
  status ENUM('To Do', 'Doing', 'Review', 'Done') NOT NULL DEFAULT 'To Do',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS task_users (
  task_id INT,
  user_id INT,
  PRIMARY KEY (task_id, user_id),
  FOREIGN KEY (task_id) REFERENCES tasks (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

INSERT INTO users (name, email, password) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'password123'),
('Bob Smith', 'bob.smith@example.com', 'securePass!'),
('Charlie Brown', 'charlie.brown@example.com', 'charlie2024'),
('Diana Prince', 'diana.prince@example.com', 'wonderwoman1'),
('Ethan Hunt', 'ethan.hunt@example.com', 'missionImpossible');
