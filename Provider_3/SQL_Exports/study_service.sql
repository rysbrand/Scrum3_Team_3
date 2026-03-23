CREATE DATABASE IF NOT EXISTS study_service;
USE study_service;

DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    status VARCHAR(40) NOT NULL,
    due_date DATE NOT NULL,
    owner_user_id INT NOT NULL,
    created_at DATETIME NOT NULL,
    CONSTRAINT fk_projects_owner FOREIGN KEY (owner_user_id) REFERENCES users(user_id)
);

CREATE TABLE tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    assigned_user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    status VARCHAR(40) NOT NULL,
    priority VARCHAR(20) NOT NULL,
    due_date DATE NOT NULL,
    CONSTRAINT fk_tasks_project FOREIGN KEY (project_id) REFERENCES projects(project_id),
    CONSTRAINT fk_tasks_user FOREIGN KEY (assigned_user_id) REFERENCES users(user_id)
);

INSERT INTO users (first_name, last_name, email, role, created_at) VALUES
('Ariana', 'Cole', 'ariana.cole@study.com', 'Student', '2026-01-10 09:15:00'),
('Micah', 'Bennett', 'micah.bennett@study.com', 'Tutor', '2026-01-11 10:20:00'),
('Jade', 'Flores', 'jade.flores@study.com', 'Student', '2026-01-12 11:45:00'),
('Noah', 'Reed', 'noah.reed@study.com', 'Mentor', '2026-01-13 08:35:00'),
('Leah', 'Turner', 'leah.turner@study.com', 'Student', '2026-01-14 12:10:00'),
('Owen', 'Grant', 'owen.grant@study.com', 'Coordinator', '2026-01-15 13:30:00'),
('Mia', 'Santos', 'mia.santos@study.com', 'Student', '2026-01-16 14:25:00');

INSERT INTO projects (project_name, category, status, due_date, owner_user_id, created_at) VALUES
('Biology Midterm Prep', 'Science', 'Active', '2026-04-05', 1, '2026-02-01 09:00:00'),
('World History Review', 'Humanities', 'Planning', '2026-04-12', 4, '2026-02-02 09:30:00'),
('Algebra Practice Sprint', 'Math', 'Active', '2026-03-30', 2, '2026-02-03 10:00:00'),
('Speech Outline Builder', 'Communication', 'Completed', '2026-03-15', 6, '2026-02-04 10:30:00'),
('Coding Fundamentals Track', 'Technology', 'Active', '2026-04-20', 3, '2026-02-05 11:00:00'),
('Chemistry Lab Notes', 'Science', 'Review', '2026-04-08', 5, '2026-02-06 11:30:00'),
('Exam Week Planner', 'Productivity', 'Active', '2026-04-25', 7, '2026-02-07 12:00:00');

INSERT INTO tasks (project_id, assigned_user_id, title, description, status, priority, due_date) VALUES
(1, 2, 'Build flashcard deck', 'Create 40 flashcards for cell structures and functions.', 'In Progress', 'High', '2026-03-25'),
(1, 1, 'Write chapter summary', 'Summarize chapters 1 through 4 in one study sheet.', 'Open', 'Medium', '2026-03-26'),
(2, 4, 'Collect source dates', 'List the major dates needed for the timeline review.', 'Open', 'Medium', '2026-03-28'),
(3, 3, 'Solve practice set A', 'Complete twenty factoring and graphing problems.', 'Completed', 'High', '2026-03-20'),
(4, 6, 'Draft speech thesis', 'Prepare the thesis and three supporting points.', 'Completed', 'Low', '2026-03-10'),
(5, 7, 'Review JavaScript basics', 'Practice variables, arrays, loops, and functions.', 'In Progress', 'High', '2026-03-29'),
(7, 5, 'Create finals checklist', 'Make a daily checklist for exam week readiness.', 'Open', 'Medium', '2026-04-01');
