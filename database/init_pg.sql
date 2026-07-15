CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(50) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (name, email, role) VALUES 
('Fathur Rahman', 'fathur@example.com', 'admin'),
('John Doe', 'john@example.com', 'user'),
('Jane Smith', 'jane@example.com', 'user')
ON CONFLICT (email) DO NOTHING;
