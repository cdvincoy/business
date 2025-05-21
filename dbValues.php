<?php

include 'dbConnect.php';

$sql = "INSERT INTO admin (name, username, password, email)
    VALUES 
        ('Jane Doe', 'admin_jane', 'password123', 'jane.doe@example.com')";
$conn->query($sql);

$sql ="INSERT INTO business_category (category_id, category_name, description) 
    VALUES
        ('C01', 'Food & Beverage', 'Restaurants, cafes, and food stalls'),
        ('C02', 'Tech Services', 'Electronics repair, IT support, and gadget shops'),
        ('C03', 'Retail & Fashion', 'Clothing stores, boutiques, and apparel shops'),
        ('C04', 'Health & Wellness', 'Clinics, spas, gyms, and personal care services'),
        ('C05', 'Home Services', 'Cleaning, plumbing, and handyman services'),
        ('C06', 'Education', 'Tutoring, online courses, and training centers'),
        ('C07', 'Transportation', 'Ride services, vehicle rentals, and logistics'), 
        ('C08', 'Arts & Entertainment', 'Photography, event planning, and performers'),
        ('C09', 'Finance & Legal', 'Accounting, loans, and legal consultation'),
        ('C10', 'Real Estate', 'Property sales, rentals, and brokerage services')";
$conn->query($sql);


$sql ="INSERT INTO business (business_id, name, description, contact_info, location)
    VALUES 
        (1, 'Tasty Treats Cafe', 'Cozy cafe with pastries and coffee', '09171234567', 'Main Street, Townville'),
        (2, 'TechFix Hub', 'Laptop and phone repair center', '09179876543', '2nd Avenue, Technocity')";
$conn->query($sql);


$sql= "INSERT INTO products_and_services (item_id, business_id, category_id, item_name, description, price)
    VALUES 
        ('I001', 1, 'C01', 'Caramel Latte', 'Creamy espresso with caramel flavor', 3.50),
        ('I002', 1, 'C01', 'Blueberry Muffin', 'Soft muffin with fresh blueberries', 2.00),
        ('I003', 2, 'C02', 'Screen Replacement', 'Phone screen repair service', 35.00),
        ('I004', 2, 'C02', 'Laptop Diagnostics', 'Full hardware/software checkup', 15.00)";
$conn->query($sql);

$conn->close();
