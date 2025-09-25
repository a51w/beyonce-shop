CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(100)
);

INSERT INTO users (username, password, name, email) VALUES
('JohnDoe', 'password123', 'John Doe', 'john@example.com'),
('JaneSmith', 'password456', 'Jane Smith', 'jane@example.com');
