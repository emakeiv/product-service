-- Drop database if exists (optional)
DROP DATABASE IF EXISTS product_service_db;

-- Create the database
CREATE DATABASE product_service_db
    WITH OWNER = "user"
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1;
