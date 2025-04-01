INSERT INTO "User" (
    customer_id,
    username,
    email,
    password,
    created_at,
    last_login_ts,
    roles,
    is_verified,
    is_active,
    email_validated,
    phone_validated
) VALUES
(1, 'alice123', 'alice.smith@example.com', 'hashed_password1', NOW(), NOW() - INTERVAL '1 day', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, TRUE),
(2, 'bob234', 'bob.johnson@example.com', 'hashed_password2', NOW(), NOW() - INTERVAL '2 days', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, FALSE),
(3, 'charlie345', 'charlie.williams@example.com', 'hashed_password3', NOW(), NULL, '["ROLE_USER"]'::json, FALSE, FALSE, FALSE, FALSE),
(4, 'david456', 'david.brown@example.com', 'hashed_password4', NOW(), NOW() - INTERVAL '3 days', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, TRUE),
(5, 'eva567', 'eva.jones@example.com', 'hashed_password5', NOW(), NULL, '["ROLE_USER"]'::json, FALSE, FALSE, TRUE, FALSE),
(6, 'frank678', 'frank.garcia@example.com', 'hashed_password6', NOW(), NOW() - INTERVAL '1 hour', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, TRUE),
(7, 'grace789', 'grace.martinez@example.com', 'hashed_password7', NOW(), NOW() - INTERVAL '5 hours', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, TRUE),
(8, 'hannah890', 'hannah.rodriguez@example.com', 'hashed_password8', NOW(), NULL, '["ROLE_USER"]'::json, FALSE, FALSE, FALSE, TRUE),
(9, 'igor901', 'igor.lee@example.com', 'hashed_password9', NOW(), NOW() - INTERVAL '2 hours', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, FALSE),
(10, 'jack012', 'jack.kim@example.com', 'hashed_password10', NOW(), NOW() - INTERVAL '1 day', '["ROLE_USER"]'::json, FALSE, TRUE, TRUE, TRUE);
