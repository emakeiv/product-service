INSERT INTO "Order" (customer_id, date_placed, date_shipped, shipping_price)
VALUES
(1, NOW(), NOW() + INTERVAL '2 days', 10.00),
(2, NOW(), NOW() + INTERVAL '3 days', 15.00),
(3, NOW(), NOW() + INTERVAL '1 day', 5.00),
(4, NOW(), NOW() + INTERVAL '4 days', 12.00),
(5, NOW(), NOW() + INTERVAL '2 days', 8.00),
(6, NOW(), NOW() + INTERVAL '1 day', 14.00),
(7, NOW(), NOW() + INTERVAL '2 days', 6.00),
(8, NOW(), NOW() + INTERVAL '3 days', 11.00),
(9, NOW(), NOW() + INTERVAL '4 days', 7.00),
(10, NOW(), NOW() + INTERVAL '1 day', 9.00);
