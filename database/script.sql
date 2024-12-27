CREATE DATABASE IF NOT EXISTS taskflow_db;

USE taskflow_db;

CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);


CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(16) NOT NULL,
  description VARCHAR(100),
  due_datetime DATETIME, 
  priority ENUM('High', 'Medium', 'Low') NOT NULL,
  status ENUM('To Do', 'Doing', 'Review', 'Done') NOT NULL DEFAULT 'To Do',
  tag VARCHAR(16) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS task_users (
  task_id INT,
  user_id INT,
  PRIMARY KEY (task_id, user_id),
  FOREIGN KEY (task_id) REFERENCES tasks (id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

INSERT INTO users (name, email, password, role) 
VALUES ('John Doe', 'u@g.com', '$2a$12$6b3cRmfIq0/5TeffMU4Co.2mYBCqn7HKGq9XDYykqYMIEJBjuEmVO', 'user'),
      ('El Jassimi', 'a@g.com', '$2a$12$OMkg7SorBrt9MDazDoWrNu3GMm3Xwi8.CB64x1VhKc7LUf9.P.f62', 'admin'),
      ('Alice Johnson', 'a.j@g.com', '$2a$12$CxFphwit5JYmkwvK3tXbCed/6iBuVt5MoG99tk8yt7PRrPU3HOaG2', 'user'),
      ('Bob Smith', 'b.s@g.com', '$2a$12$CxFphwit5JYmkwvK3tXbCed/6iBuVt5MoG99tk8yt7PRrPU3HOaG2', 'user'),
      ('Charlie Brown', 'c.b@g.com', '$2a$12$CxFphwit5JYmkwvK3tXbCed/6iBuVt5MoG99tk8yt7PRrPU3HOaG2', 'user'),
      ('Diana Prince', 'd.p@g.com', '$2a$12$CxFphwit5JYmkwvK3tXbCed/6iBuVt5MoG99tk8yt7PRrPU3HOaG2', 'user'),
      ('Ethan Hunt', 'e.h@g.com', '$2a$12$CxFphwit5JYmkwvK3tXbCed/6iBuVt5MoG99tk8yt7PRrPU3HOaG2', 'user');



INSERT INTO tasks (title, description, due_datetime, priority, status, tag) VALUES
('Fix Bug', 'Resolve the login issue on the website', '2024-12-30 10:00:00', 'High', 'To Do', 'Bug'),
('Design Logo', 'Create a new logo for the client', '2024-12-28 15:00:00', 'Medium', 'Doing', 'Feature'),
('Write Report', 'Complete the annual report', '2024-12-31 12:00:00', 'High', 'Review', 'Bug'),
('Code Review', 'Review the code for the new feature', '2024-12-27 18:00:00', 'Low', 'Done', 'Feature'),
('Team Meeting', 'Discuss project progress with the team', '2024-12-29 09:00:00', 'Medium', 'To Do', 'Feature'),
('Test Feature', 'Test the search functionality on the app', '2024-12-26 20:00:00', 'High', 'Doing','');


INSERT INTO task_users (task_id, user_id)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(1, 2),
(2, 3),
(3, 4);