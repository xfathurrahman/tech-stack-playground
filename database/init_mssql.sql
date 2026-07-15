IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'tech_test_db')
BEGIN
    CREATE DATABASE tech_test_db;
END
GO
USE tech_test_db;
GO
IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='users' and xtype='U')
BEGIN
    CREATE TABLE users (
        id INT IDENTITY(1,1) PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        role VARCHAR(50) DEFAULT 'user',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    
    INSERT INTO users (name, email, role) VALUES 
    ('Fathur Rahman', 'fathur@example.com', 'admin'),
    ('John Doe', 'john@example.com', 'user'),
    ('Jane Smith', 'jane@example.com', 'user');
END
GO
