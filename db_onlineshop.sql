-- Creating database
CREATE DATABASE onlineShop_db;

-- Using the database
USE onlineShop_db;

-- Product table
CREATE TABLE product (
    product_id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255),
    current_stock INT DEFAULT 0
);

-- Stock table
CREATE TABLE stock (
    id INT IDENTITY(1,1) PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    date DATE NOT NULL,
    [user] VARCHAR(255) NOT NULL,
    change_type VARCHAR(10) NOT NULL CHECK (change_type IN ('add', 'subtract')),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

-- Transaction table
CREATE TABLE [transaction] (
    id INT IDENTITY(1,1) PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

-- Creating User table
CREATE TABLE [user] (
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Consider encrypting this in real applications
    created_at DATE NOT NULL DEFAULT GETDATE()
);

-- Adding 5 dummy data to the product table
INSERT INTO product (name, description, price, category, current_stock) VALUES 
('Product A', 'Description of Product A', 10000.00, 'Category 1', 50),
('Product B', 'Description of Product B', 15000.00, 'Category 2', 30),
('Product C', 'Description of Product C', 20000.00, 'Category 1', 70),
('Product D', 'Description of Product D', 25000.00, 'Category 3', 20),
('Product E', 'Description of Product E', 30000.00, 'Category 2', 40);

-- Adding 5 dummy data to the stock table
INSERT INTO stock (product_id, quantity, date, [user], change_type) VALUES 
(1, 50, '2023-01-01', 'User A', 'add'),
(2, 30, '2023-02-01', 'User B', 'add'),
(3, 70, '2023-03-01', 'User C', 'add'),
(4, 20, '2023-04-01', 'User D', 'add'),
(5, 40, '2023-05-01', 'User E', 'add');

-- Adding 5 dummy data to the transaction table
INSERT INTO [transaction] (customer_name, date, product_id, quantity, total_price) VALUES 
('Customer 1', '2023-01-15', 1, 5, 50000.00),
('Customer 2', '2023-02-20', 2, 2, 30000.00),
('Customer 3', '2023-03-25', 3, 7, 140000.00),
('Customer 4', '2023-04-10', 4, 1, 25000.00),
('Customer 5', '2023-05-05', 5, 4, 120000.00);

-- Adding dummy data to the user table
INSERT INTO [user] (username, full_name, email, password) VALUES 
('userA', 'User A', 'usera@example.com', 'password123'),
('userB', 'User B', 'userb@example.com', 'password123'),
('userC', 'User C', 'userc@example.com', 'password123'),
('userD', 'User D', 'userd@example.com', 'password123'),
('userE', 'User E', 'usere@example.com', 'password123');
