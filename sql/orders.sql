/* Insert customers */
INSERT INTO customers (first_name, last_name, email, password, address, city, state, zip_code)
VALUES
('John', 'Doe', 'johndoe@example.com', 'password123', '123 Main St', 'Anytown', 'CA', '12345'),
('Jane', 'Doe', 'janedoe@example.com', 'password123', '456 Main St', 'Anytown', 'CA', '12345'),
('Bob', 'Smith', 'bobsmith@example.com', 'password123', '789 Main St', 'Othertown', 'NY', '67890');

/* Insert orders */
INSERT INTO orders (customer_id, total)
VALUES
(1, 0),
(2, 0),
(3, 0),
(2, 0);

/* Insert order items */
INSERT INTO order_items (order_id, product_id, quantity)
VALUES
(1, 1, 2),
(2, 2, 1),
(2, 3, 2),
(3, 1, 1),
(3, 2, 2),
(3, 4, 1),
(4, 6, 2),
(4, 9, 5),
(4, 1, 1);

/* Update totals */
UPDATE orders
SET total = (
  SELECT SUM(order_items.quantity * products.price)
  FROM order_items
  JOIN products ON order_items.product_id = products.product_id
  WHERE order_items.order_id = orders.order_id
)