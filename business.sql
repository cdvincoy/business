CREATE TABLE 'super_admin' (
   'sa_id' int(11) PRIMARY KEY,
   'username' varchar(50) NOT NULL,
   'password' varchar(50) NOT NULL
);

CREATE TABLE 'business_admin' (
   'ba_id' int(11) PRIMARY KEY,
   'username' varchar(50) NOT NULL,
   'password' varchar(255) NOT NULL
);

CREATE TABLE 'categories' (
   'categories_id' int(10) PRIMARY KEY,
   'name' varchar(100) NOT NULL
);

CREATE TABLE 'products' (
   'prod_id' int(10) PRIMARY KEY,
   'name' varchar(100) NOT NULL,
   'description' text,
   'price' decimal(10,2)
);

