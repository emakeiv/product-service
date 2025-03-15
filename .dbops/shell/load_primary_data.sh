#!/bin/bash

if [ "$#" -ne 3 ]; then
    echo "Usage: $0 <container_name> <db_user> <db_name>"
    exit 1
fi

CONTAINER_NAME=$1
DB_USER=$2
DB_NAME=$3
SQL_SCRIPTS_DIR="$(dirname "$0")/../data/primary"
SQL_FILES=(
    "insert_categories.sql"
    "insert_customers.sql"
    "insert_products.sql"
    "insert_orders.sql"
    "insert_customer_address.sql"
    "insert_orderlines.sql"
    "insert_barcodes.sql"
    "insert_inventories.sql"
    "insert_shopping_sessions.sql"
    "insert_carts.sql"
    "insert_cart_items.sql"
    "insert_users.sql"
)

# Load data into each table
for SQL_FILE in "${SQL_FILES[@]}"; do
    echo "Loading data from $SQL_FILE..."
    docker exec -i $CONTAINER_NAME psql -U $DB_USER -d $DB_NAME < $SQL_SCRIPTS_DIR/$SQL_FILE
    if [ $? -ne 0 ]; then
        echo "Error occurred while loading $SQL_FILE. Exiting."
        exit 1
    fi
    echo "$SQL_FILE loaded successfully."
done

echo "All primary type data loaded successfully!"
