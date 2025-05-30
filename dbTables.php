<?php // This file creates the tables in the database.
    include 'dbConnect.php';

// Create business_category table
$sql = "CREATE TABLE business_category (
    category_id     VARCHAR(10) PRIMARY KEY,
    category_name   VARCHAR(50) NOT NULL,
    description     VARCHAR(255)
)";
$conn->query($sql);

// Create business table
$sql= "CREATE TABLE business (
    business_id     INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id     VARCHAR(10) NOT NULL,
    business_owner  VARCHAR(100) NOT NULL,
    name            VARCHAR(100) NOT NULL,
    description     TEXT,
    contact_info    VARCHAR(100),
    location        VARCHAR(500),
    FOREIGN KEY (category_id) REFERENCES business_category(category_id)
)";
$conn->query($sql);

// Create admin table
$sql = "CREATE TABLE admin (
    admin_id        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(50) NOT NULL,
    username        VARCHAR(100) NOT NULL UNIQUE,
    password        VARCHAR(255) NOT NULL,
    email           VARCHAR(100) NOT NULL UNIQUE
)";
$conn->query($sql);

// Create products_and_services table
$sql = "CREATE TABLE products_and_services (
    item_id         VARCHAR(50) PRIMARY KEY,
    business_id     INT(10) UNSIGNED NOT NULL,
    category_id     VARCHAR(10) NOT NULL,
    item_name       VARCHAR(100) NOT NULL,
    description     TEXT,
    price           DECIMAL(10, 2),
    FOREIGN KEY (business_id) REFERENCES business(business_id),
    FOREIGN KEY (category_id) REFERENCES business_category(category_id)
)";
$conn->query($sql);

$conn->close();
?>
