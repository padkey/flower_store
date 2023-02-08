CREATE DATABASE flower_store
USE flower_store

CREATE TABLE	customer
(
	customer_id INT NOT NULL AUTO_INCREMENT,
	username varchar(50),
	password varchar(50),
	customer_firstname VARCHAR(50),
	customer_lastname VARCHAR(50),
	address VARCHAR(100),
	phone VARCHAR(15),
	create_at DATE,

	PRIMARY KEY(customer_id)
)
CREATE TABLE product
(
	product_id INT NOT NULL AUTO_INCREMENT,
	product_name VARCHAR(50),
	price INT,
	product_description	VARCHAR(1000),
	thumbnail  VARCHAR(200),
	small_image VARCHAR(200),
	quantity INT,
	category_id INT 

	PRIMARY KEY(product_id)
)

-- LOẠI HOA --
CREATE TABLE category
(
	category_id	INT,
	category_name VARCHAR(50),
	parent_id INT,

	PRIMARY KEY(category_id)
)

--GIỎ HÀNG -- 
CREATE TABLE cart
(
	cart_id INT NOT NULL AUTO_INCREMENT,
	customer_id INT,
	customer_firstname VARCHAR(50),
	customer_lastname VARCHAR(50),
	SHIPPING_ADDRESS VARCHAR(100), --ĐỊA CHỈ GIAO HÀNG --
	phone VARCHAR(15),
	STATUS INT,
	BASE_PRICE INT, -- TỔNG GIÁ --
	PRIMARY KEY(CART_ID)
)
CREATE TABLE	cart_item
(
	cart_item_id INT NOT NULL AUTO_INCREMENT,
	product_id INT,
	price INT,
	quantity INT,
	cart_id INT,
	PRIMARY KEY(cart_item_id)
)

-- ĐƠN HÀNG --
CREATE TABLE sale_order
(
	order_id INT NOT NULL AUTO_INCREMENT,
	customer_id INT,
	customer_firstname VARCHAR(50),
	customer_lastname VARCHAR(50),
	shipping_address VARCHAR(100),
	phone VARCHAR(15),
	base_price INT, -- TỔNG GIÁ --
	payment_menthod	varchar(30) , -- PHƯƠNG THỨC THANH TOÁN--
	shipping_method varchar(30) ,
	toltal_price INT,
	shipping_cost INT, -- phí ship
	CART_ID INT,
	PRIMARY KEY (order_id)
)
--MẶT HÀNG TRONG ĐƠN HÀNG --
CREATE TABLE ORDER_ITEM
(
	order_item_id INT NOT NULL AUTO_INCREMENT,
	order_id INT,
	price INT,
	quantity INT,
	product_id INT,
	PRIMARY KEY(order_item_id)
)
ALTER TABLE product
ADD CONSTRAINT	fk_product_category
FOREIGN KEY (category_id)
REFERENCES category(category_id);

ALTER TABLE cart
ADD CONSTRAINT fk_cart_customer
FOREIGN KEY (customer_id)
REFERENCES customer(customer_id);

ALTER TABLE cart_item
ADD CONSTRAINT fk_cart_item_cart
FOREIGN KEY (cart_id)
REFERENCES	cart(cart_id);

ALTER TABLE cart_item
ADD CONSTRAINT fk_cart_item_customer
FOREIGN KEY (product_id)
REFERENCES product(product_id);

ALTER TABLE sale_order
ADD CONSTRAINT fk_sale_order_customer
FOREIGN KEY(customer_id)
REFERENCES customer(customer_id);

ALTER TABLE sale_order
ADD CONSTRAINT fk_sale_order_cart
FOREIGN KEY(cart_id)
REFERENCES cart(cart_id);

ALTER TABLE order_item
ADD CONSTRAINT fk_order_item_sale_order
FOREIGN KEY (order_id) 
REFERENCES sale_order(order_id);

ALTER TABLE order_item
ADD CONSTRAINT fk_order_item_product
FOREIGN KEY (product_id)
REFERENCES product(product_id);


CREATE TABLE payment_method
(
	id  INT NOT NULL AUTO_INCREMENT,
	code_payment varchar(30) UNIQUE,
	name varchar(20),
	primary key(id,code_payment)
);
CREATE TABLE shipping_method
(
	id  INT NOT NULL AUTO_INCREMENT,
	code_shipping varchar(30) UNIQUE,
	cost int,
	name varchar(20),
	primary key(id,code_shipping)
)
ALTER TABLE sale_order
ADD CONSTRAINT fk_order_paymethod
FOREIGN KEY (payment_menthod)
REFERENCES payment_method(code_payment);

ALTER TABLE sale_order
ADD CONSTRAINT fk_order_shipping_method
FOREIGN KEY (shipping_method)
REFERENCES shipping_method(code_shipping);
