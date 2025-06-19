CREATE A DATABASE NAMED: career_guidance
==================================


A TABLE FOR SAVING QUESTIONNAIRE DATA
==============================
Use the SQL below to create a table in your database

CREATE TABLE responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    interest VARCHAR(255),
    best_subjects TEXT,
    learning_style VARCHAR(100),
    work_preference VARCHAR(100),
    leadership VARCHAR(100),
    suggested_programme TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
