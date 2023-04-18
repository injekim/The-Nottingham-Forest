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

/* Insert Data */
INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Basil', 2, 'A popular herb used in cooking and for medicinal purposes.', 2.99, 'https://example.com/basil.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Fast'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Roses', 3, 'A classic flower with a wide variety of colors and fragrances.', 9.99, 'https://example.com/roses.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('English Ivy', 4, 'A versatile plant often used in landscaping and as a ground cover.', 6.99, 'https://example.com/english_ivy.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '12 inches'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Partial to Full Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Boxwood Shrub', 5, 'A popular evergreen shrub often used in formal gardens and landscaping.', 19.99, 'https://example.com/boxwood_shrub.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial to Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Saguaro Cactus', 6, 'A large and iconic cactus often found in the southwestern United States.', 99.99, 'https://example.com/saguaro_cactus.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '40 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Oak Tree', 1, 'A majestic tree that can live for hundreds of years and grow up to 100 feet tall.', 299.99, 'https://example.com/oak_tree.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '100 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Mint', 2, 'A versatile herb used in cooking, tea, and for medicinal purposes.', 1.99, 'https://example.com/mint.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Fast'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Partial to Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Tulips', 3, 'A popular spring flower known for its bright colors and cup-shaped blooms.', 7.99, 'https://example.com/tulips.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '1 foot'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Pothos Ivy', 4, 'A low-maintenance houseplant with trailing vines that can grow up to 10 feet long.', 12.99, 'https://example.com/pothos_ivy.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '10 feet'),
(@product_id, 3, 'Fast'),
(@product_id, 6, 'Partial to Full Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Barrel Cactus', 6, 'A spiny desert cactus that can grow up to 3 feet tall and 2 feet wide.', 29.99, 'https://example.com/barrel_cactus.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Lavender', 2, 'A fragrant herb commonly used in aromatherapy and cooking.', 4.99, 'https://example.com/lavender.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Medium'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Japanese Cherry Blossom Tree', 1, 'A stunning ornamental tree known for its pink and white blossoms in the spring.', 399.99, 'https://example.com/cherry_blossom_tree.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '20 feet'),
(@product_id, 3, 'Medium'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Daffodils', 3, 'A cheerful spring flower with yellow, white, and orange blooms.', 6.99, 'https://example.com/daffodils.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '1 foot'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Rosemary', 2, 'A fragrant herb commonly used in cooking and known for its needle-like leaves.', 5.99, 'https://example.com/rosemary.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Slow'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Lilac Bush', 5, 'A deciduous shrub known for its fragrant, lavender-colored blooms in the spring.', 79.99, 'https://example.com/lilac_bush.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '10 feet'),
(@product_id, 3, 'Medium'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Snake Plant', 6, 'A hardy indoor plant with upright leaves that are dark green and yellow.', 24.99, 'https://example.com/snake_plant.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Low to Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Fiddle Leaf Fig', 1, 'A popular indoor tree with large, glossy, violin-shaped leaves.', 89.99, 'https://example.com/fiddle_leaf_fig.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Aloe Vera', 6, 'A succulent plant known for its medicinal properties and ability to soothe sunburns.', 19.99, 'https://example.com/aloe_vera.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Hydrangea', 3, 'A deciduous shrub with large and colorful flower heads that can change color depending on the soil pH.', 39.99, 'https://example.com/hydrangea.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Camellia', 3, 'A shrub or small tree with elegant and colorful flowers that bloom in winter or early spring.', 29.99, 'https://example.com/camellia.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '15 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Honeysuckle', 3, 'A climbing vine with sweetly scented and colorful flowers that attract hummingbirds and butterflies.', 24.99, 'https://example.com/honeysuckle.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Juniper', 5, 'A low-growing and hardy evergreen shrub with blue-green foliage that can be used for groundcover or as a border plant.', 16.99, 'https://example.com/juniper.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Daisy', 3, 'A classic and cheerful flower with a yellow center and white petals that bloom from spring to fall.', 6.99, 'https://example.com/daisy.jpg');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

/*
SELECT product_trait_values.value, COUNT(product_trait_values.value)
FROM product_trait_values
WHERE product_trait_values.trait_id = 1
GROUP BY product_trait_values.value
*/