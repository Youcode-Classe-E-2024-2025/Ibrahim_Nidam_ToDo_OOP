CREATE DATABASE IF NOT EXISTS taskflow_db;

USE taskflow_db;

-- Users table
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Tasks table
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(16) NOT NULL,
  description VARCHAR(100),
  due_datetime DATETIME, 
  priority ENUM('High', 'Medium', 'Low') NOT NULL,
  status ENUM('To Do', 'Doing', 'Review', 'Done') NOT NULL DEFAULT 'To Do',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Task-Users mapping table for many-to-many relationship
CREATE TABLE IF NOT EXISTS task_users (
  task_id INT,
  user_id INT,
  PRIMARY KEY (task_id, user_id),
  FOREIGN KEY (task_id) REFERENCES tasks (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

-- Insert sample data into users table
INSERT INTO users (name, email, password) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'password123'),
('Bob Smith', 'bob.smith@example.com', 'securePass!'),
('Charlie Brown', 'charlie.brown@example.com', 'charlie2024'),
('Diana Prince', 'diana.prince@example.com', 'wonderwoman1'),
('Ethan Hunt', 'ethan.hunt@example.com', 'missionImpossible');

-- Insert sample data into tasks table
INSERT INTO tasks (title, description, due_datetime, priority, status)
VALUES 
('Task 1', 'Complete project documentation', '2024-12-30 12:00:00', 'High', 'To Do'),
('Task 2', 'Fix login bug', '2024-12-28 15:00:00', 'Medium', 'Doing'),
('Task 3', 'Develop new feature for dashboard', '2025-01-05 09:00:00', 'High', 'To Do'),
('Task 4', 'Update server configuration', '2024-12-26 18:00:00', 'Low', 'Review'),
('Task 5', 'Test e-commerce payment system', '2024-12-31 23:59:00', 'Medium', 'Done');

-- Insert sample data into task_users table
INSERT INTO task_users (task_id, user_id)
VALUES
(1, 1), -- Task 1 assigned to User 1
(2, 2), -- Task 2 assigned to User 2
(3, 3), -- Task 3 assigned to User 3
(4, 4), -- Task 4 assigned to User 4
(5, 5), -- Task 5 assigned to User 5
(1, 2), -- Task 1 also assigned to User 2
(2, 3), -- Task 2 also assigned to User 3
(3, 4); -- Task 3 also assigned to User 4