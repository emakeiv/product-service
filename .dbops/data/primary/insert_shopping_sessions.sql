INSERT INTO "ShoppingSession" (customer_id, session_start, session_end, cart_id)
VALUES
(1, NOW() - INTERVAL '1 hour', NOW(), 1),
(2, NOW() - INTERVAL '2 hours', NOW(), 2),
(3, NOW() - INTERVAL '30 minutes', NOW(), 3),
(4, NOW() - INTERVAL '45 minutes', NOW(), 4),
(5, NOW() - INTERVAL '1 hour', NOW(), 5),
(6, NOW() - INTERVAL '90 minutes', NOW(), 6),
(7, NOW() - INTERVAL '2 hours', NOW(), 7),
(8, NOW() - INTERVAL '3 hours', NOW(), 8),
(9, NOW() - INTERVAL '4 hours', NOW(), 9),
(10, NOW() - INTERVAL '5 hours', NOW(), 10);
