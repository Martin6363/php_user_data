USE company_office;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    gender VARCHAR(50) NOT NULL,
    phone_num INT(100) UNIQUE,
    born DATE NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Department table
CREATE TABLE IF NOT EXISTS departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    d_name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Positions table
CREATE TABLE IF NOT EXISTS positions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    p_name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Company table
CREATE TABLE IF NOT EXISTS companies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    description TEXT(1000) NOT NULL,
    department_id INT NOT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Employees table
CREATE TABLE IF NOT EXISTS employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    dob DATE NOT NULL,
    phone_number INT(25) NOT NULL,
    gender VARCHAR(25) NOT NULL,
    country VARCHAR(100) NOT NULL,
    create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    company_id INT NOT NULL,
    position_id INT NOT NULL,
    super_visor_id INT,
    FOREIGN KEY (company_id) REFERENCES companies(id),
    FOREIGN KEY (position_id) REFERENCES positions(id),
    FOREIGN KEY (super_visor_id) REFERENCES employees(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Director Salary table
CREATE TABLE IF NOT EXISTS salaries (
    id INT PRIMARY KEY AUTO_INCREMENT,
    emp_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    hire_date DATE NOT NULL,
    bonus VARCHAR(100),
    FOREIGN KEY (emp_id) REFERENCES employees(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- Example: Insert departments
INSERT INTO departments (d_name) VALUES ('HR'), ('IT'), ('Finance');


-- Example: Insert positions
INSERT INTO positions (p_name) VALUES ('Manager'), ('Developer'), ('Accountant');


-- Example: Insert companies
INSERT INTO companies (name, type, description, department_id) VALUES
    ('Company A', 'Type A', 'Description A', 1),
    ('Company B', 'Type B', 'Description B', 2),
    ('Company C', 'Type C', 'Description C', 3);


-- Example: Insert employees
INSERT INTO employees (first_name, last_name, email, dob, phone_number, gender, country, company_id, position_id, super_visor_id)
VALUES
    ('John', 'Doe', 'john.doe@example.com', '1990-01-01', 123456789, 'Male', 'USA', 1, 1, NULL),
    ('Jane', 'Smith', 'jane.smith@example.com', '1985-02-15', 987654321, 'Female', 'Canada', 2, 2, 1),
    ('Bob', 'Johnson', 'bob.johnson@example.com', '1995-05-10', 555555555, 'Male', 'UK', 3, 3, 2),
    ('Jane', 'Smith', 'jane.smith@example.com', '1985-02-15', 987654321, 'Female', 'Canada', 2, 2, 2),
    ('Bob', 'Johnson', 'bob.johnson@example.com', '1995-05-10', 555555555, 'Male', 'UK', 3, 3, 1),
    ('Jane', 'Smith', 'jane.smith@example.com', '1985-02-15', 987654321, 'Female', 'Canada', 2, 2, 2),
    ('Bob', 'Johnson', 'bob.johnson@example.com', '1995-05-10', 555555555, 'Male', 'UK', 3, 3, 1);


-- Example: Insert salaries
INSERT INTO salaries (emp_id, amount, hire_date, bonus) VALUES
    (1, 60000.00, '2023-01-01', 'Year-end bonus'),
    (2, 75000.00, '2023-02-15', 'Performance bonus');




-- JOIN companies & departments
SELECT 
    companies.id AS id,
    companies.name AS name,
    companies.type AS type,
    companies.description AS description,
    departments.d_name AS department_name
FROM 
    companies
INNER JOIN 
    departments ON companies.department_id = departments.id;


-- JOIN employees․ positions, companies
SELECT 
    companies.id AS company_id,
    companies.name AS company_name,
    companies.type AS company_type,
    companies.description AS company_description,
    companies.department_id AS department_id,
    departments.d_name AS department_name,
    positions.p_name AS position_name,
    companies.name AS company_name
FROM 
    employees
INNER JOIN 
    companies ON employees.company_id = companies.id
INNER JOIN 
    departments ON companies.department_id = departments.id
INNER JOIN 
    positions ON employees.position_id = positions.id;