<?php // This file contains the values for each tables in the 'business' database.
include 'dbConnect.php';

// Insert admin values
$sql = "INSERT INTO admin (name, username, password, email)
    VALUES 
        ('Juan Dela Cruz', 'admin_juan', '$2y$10$252b24zBsvtphtPCEAWJa.XPCqu0pJu0xeRJn9qXDa9L5KSjNyx3e', 'jdcruz@gmail.com')";
$conn->query($sql);

// Insert business_category values
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

// Insert business values
$sql ="INSERT INTO business (business_id, category_id, business_owner, name, description, contact_info, location) #put category_id here siguro
    VALUES 
        (1, 'C01', 'Antonio Reyes', 'Tasty Treats Cafe', 'Cozy cafe with pastries and coffee', '09171234567', 'Baybay Norte, Miagao, Iloilo'),
        (2, 'C01', 'Jomar Dela Cruz','Ponytail Restobar', 'Eat at day, party at night', '09173211122', 'Box 2, Guimbal'),
        (3, 'C02', 'Rowena Mendoza', 'TechFix Hub', 'Laptop and phone repair center', '09179876543', 'Baybay Sur, Miagao, Iloilo'),
        (4, 'C02', 'Ramon Villareal','MalwareBits Solutions', 'Cybersecurity specialists center', '09177823445', 'Guibongan, Miagao, Iloilo'),
        (5, 'C03', 'Marco Tan','Carbon Dioxide', 'Trendy sneaker and streetwear store', '09191193300', 'Orbe Street, Miagao, Iloilo'),
        (6, 'C03', 'Nestor Angeles','Elsa(n)', 'Boutique for important ocassions', '09209487744', 'Noble Street, Miagao, Iloilo'),
        (7, 'C04', 'Luisito Navarro','Vella Medical Group', '#1 Medical Aesthetic Clinic', '09194327999', 'Legaspi Street, Miagao, Iloilo'),
        (8, 'C04', 'Gilbert Soriano','Silvers Gym', 'Premier strength training & bodybuilding gym', '09171234567', 'Orbe Street, Miagao, Iloilo'),
        (9, 'C05', 'Erwin Domingo', 'GetKleansed', 'Premier provider of comprehensive cleaning', '09171234567', 'Quezon Street, Miagao, Iloilo'),
        (10, 'C05', 'Crisanto Javier', 'Tubero Specialists', 'Your one-stop shop for all your plumbing needs', '09171234567', 'Nonato Street, Miagao, Iloilo'),
        (11, 'C06', 'Lourdes Ramos', 'MOUTH Review & Tutorial Center', 'Review Center for Math and Science', '09171234567', 'Orbe Street, Miagao, Iloilo'),
        (12, 'C06', 'Jeanette Lim', 'IRise-Up Review & Tutorial Center', 'Tutorial for everyone', '09171234567', 'Kirayan Norte, Miagao, Iloilo'),
        (13, 'C07', 'Marilou Gonzales', 'Hold Services', '#1 all-in-one taxi, ride hailing, transport, express grocery shopping and food delivery', '09171234567', 'Nonato Street, Miagao, Iloilo'),
        (14, 'C07', 'Analyn Dela Vega', 'Akbay', 'Number 1 ride hailing app in the Philippines', '09171234567', 'Noble Street, Miagao, Iloilo'),
        (15, 'C08', 'Cecilia Yusay', 'Puto-Graphy Studio', 'Photographs for the Soft-Hearted', '09171234567', 'Legaspi Street, Miagao, Iloilo'),
        (16, 'C08', 'Grace Tabares', 'Indie Will Always Love You', 'Indie production house', '09171234567', 'Noble Street, Miagao, Iloilo'),
        (17, 'C09', 'Kristine Baldonado', 'Soriano & Co. Law Offices', 'Trusted legal services and consultation', '09171234567', 'Noble Street, Miagao, Iloilo'),
        (18, 'C09', 'Melanie Alipao', 'For Peace Finance Corporation', 'Microfinacing and personal loans for local communities', '09171234567', 'Legaspi Street, Miagao, Iloilo'),
        (19, 'C10', 'Joan Cabalfin', 'Not a Dream, But a Realty', 'Real estate brokerage services', '09171234567', 'Tacas, Miagao, Iloilo'),
        (20, 'C10', 'Ronald Weasley','Bahay Mo Bato', 'Laptop and phone repair center', '09179876543', 'Palaca, Miagao, Iloilo')";
$conn->query($sql);

// Insert products_and_services values
$sql = "INSERT INTO products_and_services (item_id, business_id, category_id, item_name, description, price) 
    VALUES 
        ('I001', 1, 'C01', 'Caramel Latte', 'Creamy espresso with caramel flavor', 85.50),
        ('I002', 1, 'C01', 'Blueberry Muffin', 'Soft muffin with fresh blueberries', 30.00),
        ('I003', 2, 'C01', 'Beef Tapa Rice Meal', 'All-day breakfast meal', 120.00),
        ('I004', 2, 'C01', 'House Cocktail', 'Signature cocktail for nightlife vibes', 150.00),
        ('I005', 3, 'C02', 'Screen Replacement', 'Phone screen repair service', 1005.00),
        ('I006', 3, 'C02', 'Laptop Diagnostics', 'Full hardware/software checkup', 500.00),
        ('I007', 4, 'C02', 'Virus Removal', 'Malware and spyware cleanup service', 800.00),
        ('I008', 4, 'C02', 'Network Security Setup', 'Firewall and antivirus system installation', 3000.00),
        ('I009', 5, 'C03', 'Nike Air Jordan 1', 'Limited edition sneakers', 9000.00),
        ('I010', 5, 'C03', 'Graphic Tee', 'Urban-style printed t-shirt', 450.00),
        ('I011', 6, 'C03', 'Ball Gown Rental', 'Elegant gown for formal events', 2000.00),
        ('I012', 6, 'C03', 'Makeup + Styling Package', 'Hair and makeup for special occasions', 1500.00),
        ('I013', 7, 'C04', 'Laser Whitening', 'Facial treatment for skin brightening', 1800.00),
        ('I014', 7, 'C04', 'Acne Scar Treatment', 'Derma solution for acne scars', 2000.00),
        ('I015', 8, 'C04', 'Monthly Gym Membership', 'Access to all equipment and classes', 1500.00),
        ('I016', 8, 'C04', 'Personal Training Session', '1-on-1 fitness training', 400.00),
        ('I017', 9, 'C05', 'Deep Cleaning', 'Whole-house sanitation service', 3500.00),
        ('I018', 9, 'C05', 'Office Disinfection', 'Surface and air disinfection service', 2800.00),
        ('I019', 10, 'C05', 'Leak Repair', 'Basic pipe leak repair service', 850.00),
        ('I020', 10, 'C05', 'Bathroom Installation', 'Full bathroom plumbing setup', 5000.00),
        ('I021', 11, 'C06', 'Senior High Math Review', 'Comprehensive math drills', 1200.00),
        ('I022', 11, 'C06', 'Science Masterclass', 'In-depth science tutorial program', 1500.00),
        ('I023', 12, 'C06', 'Elementary Tutoring (1hr)', 'Tutoring for Grades 1–6', 300.00),
        ('I024', 12, 'C06', 'College Entrance Review', 'Review classes for UPCAT, etc.', 2500.00),
        ('I025', 13, 'C07', 'Ride Booking', 'Standard transport within Iloilo', 150.00),
        ('I026', 13, 'C07', 'Grocery Delivery', 'Get groceries delivered in 2 hours', 50.00),
        ('I027', 14, 'C07', 'Motorbike Ride', 'Affordable bike ride service', 70.00),
        ('I028', 14, 'C07', 'FoodExpress Delivery', 'Restaurant food delivery', 30.00),
        ('I029', 15, 'C08', '1-Hour Studio Shoot', 'Professional photo shoot with backdrop', 1000.00),
        ('I030', 15, 'C08', 'Prenup Photoshoot', 'Romantic couple shoot for weddings', 4500.00),
        ('I031', 16, 'C08', 'Indie Film Production', 'Short film direction and editing', 12000.00),
        ('I032', 16, 'C08', 'Music Video Shoot', 'Creative MV filming and post-prod', 15000.00),
        ('I033', 17, 'C09', 'Legal Consultation', 'Initial 1-hour consultation', 1000.00),
        ('I034', 17, 'C09', 'Contract Drafting', 'Professional legal document creation', 3000.00),
        ('I035', 18, 'C09', 'Personal Loan Processing', 'Application and processing', 0.00),
        ('I036', 18, 'C09', 'Loan Restructuring', 'Assistance with repayment planning', 500.00),
        ('I037', 19, 'C10', 'Lot Listing Fee', 'Posting of property for sale/rent', 100.00),
        ('I038', 19, 'C10', 'Realty Consultation', 'Consulting for land investment', 500.00),
        ('I039', 20, 'C10', 'Premium House Construction', 'Complete design and build package', 1000000.00)";
$conn->query($sql);
$conn->close();
