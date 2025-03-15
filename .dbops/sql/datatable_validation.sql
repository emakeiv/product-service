SELECT conname AS constraint_name, conrelid::regclass AS table_name
FROM pg_constraint
WHERE connamespace = 'public'::regnamespace;
