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


$sql ="INSERT INTO business (business_id, category_id, name, description, contact_info, location) #put category_id here siguro
    VALUES 
        (1, 'C01', 'Tasty Treats Cafe', 'Cozy cafe with pastries and coffee', '09171234567', 'Main Street, Townville'),
        (2, 'C01', 'Ponytail Restobar', 'Eat at day, party at night', '09173211122', 'Box 2, Guimbal'),
        (3, 'C02', 'TechFix Hub', 'Laptop and phone repair center', '09179876543', '2nd Avenue, Technocity'),
        (4, 'C02', 'MalwareBits Solutions', 'Cybersecurity specialists center', '09177823445', 'I/O Street, Technocity'),
        (5, 'C03', 'Carbon Dioxide', 'Trendy sneaker and streetwear store', '09191193300', 'Elevate Road, ETC'),
        (6, 'C03', 'Elsa(n)', 'Boutique for important ocassions', '09209487744', 'Downtown, Townville'),
        (7, 'C04', 'Vella Medical Group', '#1 Medical Aesthetic Clinic', '09194327999', 'Main Street, Townville'),
        (8, 'C04', 'Silvers Gym', 'Premier strength training & bodybuilding gym', '09171234567', 'Main Street, Townville'),
        (9, 'C05', 'GetKleansed', 'Premier provider of comprehensive cleaning', '09171234567', 'Main Street, Townville'),
        (10, 'C05', 'Tubero Specialists', 'Your one-stop shop for all your plumbing needs', '09171234567', 'Main Street, Townville'),
        (11, 'C06', 'MOUTH Review & Tutorial Center', 'Review Center for Math and Science', '09171234567', 'Main Street, Townville'),
        (12, 'C06', 'IRise-Up Review & Tutorial Center', 'Tutorial for everyone', '09171234567', 'Main Street, Townville'),
        (13, 'C07', 'Hold Services', '#1 all-in-one taxi, ride hailing, transport, express grocery shopping and food delivery', '09171234567', 'Main Street, Townville'),
        (14, 'C07', 'Akbay', 'Number 1 ride hailing app in the Philippines', '09171234567', 'Main Street, Townville'),
        (15, 'C08', 'Puto-Graphy Studio', 'Photographs for the Soft-Hearted', '09171234567', 'Main Street, Townville'),
        (16, 'C08', 'Indie Will Always Love You', 'Indie production house', '09171234567', 'Main Street, Townville'),
        (17, 'C09', 'Soriano & Co. Law Offices', 'Cozy cafe with pastries and coffee', '09171234567', 'Main Street, Townville'),
        (18, 'C09', 'For Peace Finance Corporation', 'Cozy cafe with pastries and coffee', '09171234567', 'Main Street, Townville'),
        (19, 'C10', 'Not a Dream, But a Realty', 'Cozy cafe with pastries and coffee', '09171234567', 'Main Street, Townville'),
        (20, 'C10', 'Bahay Mo Bato', 'Laptop and phone repair center', '09179876543', '2nd Avenue, Technocity')";
$conn->query($sql);


$sql= "INSERT INTO products_and_services (item_id, business_id, category_id, item_name, description, price) #make products and services appear when clicking
    VALUES 
        ('I001', 1, 'C01', 'Caramel Latte', 'Creamy espresso with caramel flavor', 3.50),
        ('I002', 1, 'C01', 'Blueberry Muffin', 'Soft muffin with fresh blueberries', 2.00),
        ('I003', 2, 'C02', 'Screen Replacement', 'Phone screen repair service', 35.00),
        ('I004', 2, 'C02', 'Laptop Diagnostics', 'Full hardware/software checkup', 15.00)";
$conn->query($sql);

$conn->close();
