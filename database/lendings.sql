CREATE TABLE Lendings (
    lending_id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    book_price DECIMAL(10, 2),
    customer_name VARCHAR(255),
    citizen_id VARCHAR(20),
    phone VARCHAR(20),
    start_date DATE,
    return_date DATE,
    email VARCHAR(255),
    is_member BOOLEAN,
    total_price DECIMAL(10, 2)
);