-- Drop existing user if exists (optional)
DROP ROLE IF EXISTS "user";

-- Create new user
CREATE ROLE "user" WITH LOGIN PASSWORD 'user' CREATEDB;
