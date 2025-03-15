INSERT INTO "User" (customer_id, username, email_address, password_hash, created_at, last_login_ts, is_active, email_validated, phone_validated)
VALUES
(1, 'alice123', 'alice.smith@example.com', 'hash1', NOW(), NOW() - INTERVAL '1 day', TRUE, TRUE, TRUE),
(2, 'bob234', 'bob.johnson@example.com', 'hash2', NOW(), NOW() - INTERVAL '2 days', TRUE, TRUE, FALSE),
(3, 'charlie345', 'charlie.williams@example.com', 'hash3', NOW(), NULL, FALSE, FALSE, FALSE),
(4, 'david456', 'david.brown@example.com', 'hash4', NOW(), NOW() - INTERVAL '3 days', TRUE, TRUE, TRUE),
(5, 'eva567', 'eva.jones@example.com', 'hash5', NOW(), NULL, FALSE, TRUE, FALSE),
(6, 'frank678', 'frank.garcia@example.com', 'hash6', NOW(), NOW() - INTERVAL '1 hour', TRUE, TRUE, TRUE),
(7, 'grace789', 'grace.martinez@example.com', 'hash7', NOW(), NOW() - INTERVAL '5 hours', TRUE, TRUE, TRUE),
(8, 'hannah890', 'hannah.rodriguez@example.com', 'hash8', NOW(), NULL, FALSE, FALSE, TRUE),
(9, 'igor901', 'igor.lee@example.com', 'hash9', NOW(), NOW() - INTERVAL '2 hours', TRUE, TRUE, FALSE),
(10, 'jack012', 'jack.kim@example.com', 'hash10', NOW(), NOW() - INTERVAL '1 day', TRUE, TRUE, TRUE);
