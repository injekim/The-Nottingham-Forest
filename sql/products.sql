INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Basil', 2, 'A popular herb used in cooking and for medicinal purposes.', 2.99, './images/product_photos/basil.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Fast'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Roses', 3, 'A classic flower with a wide variety of colors and fragrances.', 9.99, './images/product_photos/roses.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('English Ivy', 4, 'A versatile plant often used in landscaping and as a ground cover.', 6.99, './images/product_photos/english_ivy.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '12 inches'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Partial to Full Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Boxwood Shrub', 5, 'A popular evergreen shrub often used in formal gardens and landscaping.', 19.99, './images/product_photos/boxwood_shrub.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial to Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Saguaro Cactus', 6, 'A large and iconic cactus often found in the southwestern United States.', 99.99, './images/product_photos/saguaro_cactus.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '40 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Oak Tree', 1, 'A majestic tree that can live for hundreds of years and grow up to 100 feet tall.', 299.99, './images/product_photos/oak_tree.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '100 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Mint', 2, 'A versatile herb used in cooking, tea, and for medicinal purposes.', 1.99, './images/product_photos/mint.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Fast'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Partial to Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Tulips', 3, 'A popular spring flower known for its bright colors and cup-shaped blooms.', 7.99, './images/product_photos/tulips.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '1 foot'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Pothos Ivy', 4, 'A low-maintenance houseplant with trailing vines that can grow up to 10 feet long.', 12.99, './images/product_photos/pothos_ivy.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '10 feet'),
(@product_id, 3, 'Fast'),
(@product_id, 6, 'Partial to Full Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Barrel Cactus', 6, 'A spiny desert cactus that can grow up to 3 feet tall and 2 feet wide.', 29.99, './images/product_photos/barrel_cactus.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Lavender', 2, 'A fragrant herb commonly used in aromatherapy and cooking.', 4.99, './images/product_photos/lavender.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Medium'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Japanese Cherry Blossom Tree', 1, 'A stunning ornamental tree known for its pink and white blossoms in the spring.', 399.99, './images/product_photos/cherry_blossom_tree.png');

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
VALUES ('Daffodils', 3, 'A cheerful spring flower with yellow, white, and orange blooms.', 6.99, './images/product_photos/daffodils.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '1 foot'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Regular Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Rosemary', 2, 'A fragrant herb commonly used in cooking and known for its needle-like leaves.', 5.99, './images/product_photos/rosemary.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 2, 'Edible'),
(@product_id, 3, 'Slow'),
(@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Lilac Bush', 5, 'A deciduous shrub known for its fragrant, lavender-colored blooms in the spring.', 79.99, './images/product_photos/lilac_bush.png');

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
VALUES ('Snake Plant', 6, 'A hardy indoor plant with upright leaves that are dark green and yellow.', 24.99, './images/product_photos/snake_plant.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Low to Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Fiddle Leaf Fig', 1, 'A popular indoor tree with large, glossy, violin-shaped leaves.', 89.99, './images/product_photos/fiddle_leaf_fig.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Aloe Vera', 6, 'A succulent plant known for its medicinal properties and ability to soothe sunburns.', 19.99, './images/product_photos/aloe_vera.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 6, 'Bright Indirect Light'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Hydrangea', 3, 'A deciduous shrub with large and colorful flower heads that can change color depending on the soil pH.', 39.99, './images/product_photos/hydrangea.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '6 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Camellia', 3, 'A shrub or small tree with elegant and colorful flowers that bloom in winter or early spring.', 29.99, './images/product_photos/camellia.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '15 feet'),
(@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Honeysuckle', 3, 'A climbing vine with sweetly scented and colorful flowers that attract hummingbirds and butterflies.', 24.99, './images/product_photos/honeysuckle.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 4, 'Fragrant'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun to Partial Shade'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Juniper', 5, 'A low-growing and hardy evergreen shrub with blue-green foliage that can be used for groundcover or as a border plant.', 16.99, './images/product_photos/juniper.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 1, '3 feet'),
(@product_id, 3, 'Slow'),
(@product_id, 5, 'Pruning Required'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Low Water Needs');

INSERT INTO products (product_name, category_id, description, price, image_url)
VALUES ('Daisy', 3, 'A classic and cheerful flower with a yellow center and white petals that bloom from spring to fall.', 6.99, './images/product_photos/daisy.png');

SET @product_id = LAST_INSERT_ID();

INSERT INTO product_trait_values (product_id, trait_id, value)
VALUES (@product_id, 4, 'Fragrant'),
(@product_id, 6, 'Full Sun'),
(@product_id, 7, 'Disease-Resistant'),
(@product_id, 8, 'Moderate Water Needs');