#!/bin/bash
set -e  # Exit on error

#psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/sql/00_create_database_user.sql
#psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/sql/01_create_database.sql
#psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/sql/03_grant_privileges.sql

psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/sql/create_auxiliary_tables.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/sql/create_primary_tables.sql


psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_countries.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_cities.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_payment_providers.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_category_names.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_cart_states.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/auxiliary/insert_payment_transactions.sql

psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_customers.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_users.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_categories.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_products.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_orders.sql
psql -U user -d product_service_db -f /docker-entrypoint-initdb.d/data/primary/insert_orderlines.sql