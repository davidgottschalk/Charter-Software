CREATE TABLE plane_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manufacturer VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    speed INT NOT NULL,
    max_range INT NOT NULL,
    pax INT NOT NULL,
    engine_type VARCHAR(50),
    engine_count INT NOT NULL,
    hourly_cost DECIMAL(10,2) NOT NULL,
    annual_fixed_cost DECIMAL(20,2) NOT NULL,
    flight_crew INT NOT NULL,
    cabin_crew INT NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

CREATE TABLE airports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    airport_name VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    iata_faa VARCHAR(100),
    icao VARCHAR(100),
    latitude DECIMAL(18,12)NOT NULL,
    longitude DECIMAL(18,12) NOT NULL,
    altitude INT NOT NULL,
    timezone INT NOT NULL,
    dst VARCHAR(1) NOT NULL,
    timezone_db VARCHAR(100) NOT NULL
);

CREATE TABLE customer_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(10) NOT NULL
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_number INT NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    company VARCHAR(100),
    street VARCHAR(50) NOT NULL,
    postal_code INT NOT NULL,
    country VARCHAR(50) NOT NULL,
    customer_type_id INT NOT NULL,
    strike INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    status INT NOT NULL,
    FOREIGN KEY customer_type_key(customer_type_id) REFERENCES customer_types(id)
);

CREATE TABLE planes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plane_name VARCHAR(30) NOT NULL,
    plane_number INT NOT NULL,
    plane_type_id INT NOT NULL,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY plane_type_key(plane_type_id) REFERENCES plane_types(id)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    street VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    postal_code INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    group_id INT NOT NULL,
    status INT NOT NULL,
    payment INT NOT NULL,
    created DATETIME,
    exit_date DATETIME,
    email VARCHAR(100) NOT NULL,
    FOREIGN KEY group_key(group_id) REFERENCES groups(id)
);

CREATE TABLE flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_number VARCHAR(20),
    customer_id INT NOT NULL,
    plane_id INT NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    status INT NOT NULL,
    cost_effectiv_travel_time DECIMAL(5,2) NOT NULL,
    catering INT NOT NULL,
    FOREIGN KEY plane_key(plane_id) REFERENCES planes(id),
    FOREIGN KEY customer_key(customer_id) REFERENCES customers(id)
);

CREATE TABLE users_flights (
    flight_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (flight_id, user_id),
    FOREIGN KEY flight_key1(flight_id) REFERENCES flights(id),
    FOREIGN KEY user_key(user_id) REFERENCES users(id)
);

CREATE TABLE airports_flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_id INT NOT NULL,
    airport_id INT NOT NULL,
    flight_time INT NOT NULL,
    stay_duration INT NOT NULL,
    order_number INT NOT NULL,
    FOREIGN KEY flight_key2(flight_id) REFERENCES flights(id),
    FOREIGN KEY airport_key(airport_id) REFERENCES airports(id)
);

CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_number VARCHAR(20),
    flight_id INT NOT NULL,
    value DECIMAL(20,2),
    status INT NOT NULL,
    due_date DATETIME,
    automatic INT,
    FOREIGN KEY flight_invoice_key(flight_id) REFERENCES flights(id)
);

CREATE TABLE reject_reasons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reason_id INT NOT NULL,
    created DATETIME
);

CREATE TABLE income_by_plane_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plane_type_id INT NOT NULL,
    invoice_id INT NOT NULL,
    created DATETIME,
    travell_time DECIMAL(5,2),
    FOREIGN KEY plane_typ_key(plane_type_id) REFERENCES plane_types(id),
    FOREIGN KEY invoice_key(invoice_id) REFERENCES invoices(id)
);

CREATE TABLE customer_satisfactions(
    id INT AUTO_INCREMENT PRIMARY KEY,
    answer1 INT NOT NULL,
    answer2 INT NOT NULL,
    answer3 INT NOT NULL,
    answer4 INT NOT NULL,
    answer5 INT NOT NULL,
    created DATETIME
);
