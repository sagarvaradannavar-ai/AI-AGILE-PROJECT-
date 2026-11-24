
CREATE DATABASE IF NOT EXISTS agile_ml;

USE agile_ml;

CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    skills VARCHAR(255),
    experience INT DEFAULT 0,
    workload INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(150) NOT NULL,
    description TEXT,
    required_skill VARCHAR(100),
    complexity VARCHAR(30),
    priority VARCHAR(30),
    estimated_hours INT,
    deadline DATE,
    assigned_member INT,
    status VARCHAR(30) DEFAULT 'Pending',
    predicted_days FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_member) REFERENCES members(id)
);

INSERT INTO members (name, email, skills, experience)
VALUES
('Sagar', 'sagar@example.com', 'HTML,CSS,PHP', 2),
('Member 2', 'member2@example.com', 'Python,ML', 1),
('Member 3', 'member3@example.com', 'Java,MySQL', 2);
