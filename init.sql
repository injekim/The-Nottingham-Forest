CREATE DATABASE nottingham_forest;

USE nottingham_forest;

CREATE TABLE categories (
  category_id INT(11) NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (category_id)
);

CREATE TABLE products (
  product_id INT NOT NULL AUTO_INCREMENT,
  product_name VARCHAR(255) NOT NULL,
  category_id INT(11) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  image_url VARCHAR(255),
  PRIMARY KEY (product_id),
  FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE product_traits (
  trait_id INT NOT NULL AUTO_INCREMENT,
  trait_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (trait_id)
);

CREATE TABLE product_trait_values (
    product_id INT NOT NULL,
    trait_id INT NOT NULL,
    value VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (trait_id) REFERENCES product_traits(trait_id) ON DELETE CASCADE,
    UNIQUE KEY (product_id, trait_id, value)
);

CREATE TABLE customers (
  customer_id INT(11) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  state VARCHAR(255) NOT NULL,
  zip_code VARCHAR(10) NOT NULL,
  PRIMARY KEY (customer_id)
);

CREATE TABLE orders (
  order_id INT(11) NOT NULL AUTO_INCREMENT,
  customer_id INT(11) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (order_id),
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE order_items (
  order_id INT(11) NOT NULL,
  product_id INT(11) NOT NULL,
  quantity INT(11) NOT NULL,
  PRIMARY KEY (order_id, product_id),
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);

/* Setup Categories */
INSERT INTO categories (category_name) VALUES ('Trees');    # id: 1
INSERT INTO categories (category_name) VALUES ('Herbs');   # id: 2
INSERT INTO categories (category_name) VALUES ('Flowers');   # id: 3
INSERT INTO categories (category_name) VALUES ('Ivy');   # id: 4
INSERT INTO categories (category_name) VALUES ('Shrubs');   # id: 5
INSERT INTO categories (category_name) VALUES ('Cactus');   # id: 6

/* Setup Traits */
INSERT INTO product_traits (trait_name) VALUES ('Mature Height'); # id: 1
INSERT INTO product_traits (trait_name) VALUES ('Edible');    # id: 2
INSERT INTO product_traits (trait_name) VALUES ('Growth Rate');  # id: 3
INSERT INTO product_traits (trait_name) VALUES ('Fragrance');    # id: 4
INSERT INTO product_traits (trait_name) VALUES ('Pruning Needs');    # id: 5
INSERT INTO product_traits (trait_name) VALUES ('Sunlight Requirements');    # id: 6
INSERT INTO product_traits (trait_name) VALUES ('Disease Resistance');    # id: 7
INSERT INTO product_traits (trait_name) VALUES ('Watering Needs');    # id: 8

/*
SELECT product_trait_values.value, COUNT(product_trait_values.value)
FROM product_trait_values
WHERE product_trait_values.trait_id = 1
GROUP BY product_trait_values.value
*/