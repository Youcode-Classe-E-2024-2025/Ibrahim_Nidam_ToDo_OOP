
CREATE DATABASE IF NOT EXISTS taskflow_db;


USE taskflow_db;


CREATE TABLE IF NOT EXISTS users (
  id BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  name TEXT NOT NULL,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL
);


CREATE TABLE IF NOT EXISTS tasks (
  id BIGINT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  title TEXT NOT NULL,
  description TEXT,
  type TEXT NOT NULL,
  status ENUM('To Do', 'Doing', 'Review', 'Done') NOT NULL,
  created_at TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
  updated_at TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
  user_id BIGINT REFERENCES users (id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS task_users (
  task_id BIGINT REFERENCES tasks (id) ON DELETE CASCADE,
  user_id BIGINT REFERENCES users (id) ON DELETE CASCADE,
  PRIMARY KEY (task_id, user_id)
);


INSERT INTO users (name, email, password) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'password123'),
('Bob Smith', 'bob.smith@example.com', 'securePass!'),
('Charlie Brown', 'charlie.brown@example.com', 'charlie2024'),
('Diana Prince', 'diana.prince@example.com', 'wonderwoman1'),
('Ethan Hunt', 'ethan.hunt@example.com', 'missionImpossible');

