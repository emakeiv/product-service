DO
$$
DECLARE
    _stmt text;
BEGIN
    -- For each table in the current schema
    FOR _stmt IN
        SELECT 'DROP TABLE IF EXISTS "' || tablename || '" CASCADE;'
        FROM pg_tables
        WHERE schemaname = 'public'
    LOOP
        EXECUTE _stmt;
    END LOOP;
END;
$$;