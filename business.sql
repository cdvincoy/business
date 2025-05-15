CREATE TABLE business
	(business_id 		int(10),
	name			varchar(100),
	description		text,
	contact_info		varchar(20),
	location		varchar(500),
	primary key (business_id));

CREATE TABLE admin
	(admin_id		int(10),
	name			varchar(50),
	password		varchar(50),
	email			varchar(100),
	username		varchar(100),
	primary key (admin_id));

CREATE TABLE business_category
	(category_id 		varchar(10),
	category_name	        varchar(50),
	description		varchar(50),
	primary key (category_id));

CREATE TABLE products_and_services 
	(item_id 		varchar(50),
	business_id		int(10),
	category_id		varchar(10),
	item_name		varchar(50),
	description		text,
	price			varchar(50),
	primary key (item_id),
	foreign key (business_id) references business(business_id),
	foreign key (category_id) references business_category(category_id));

