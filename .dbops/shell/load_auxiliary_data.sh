#!/bin/bash

if [ "$#" -ne 3 ]; then
    echo "Usage: $0 <container_name> <db_user> <db_name>"
    exit 1
fi

CONTAINER_NAME=$1
DB_USER=$2
DB_NAME=$3
SQL_SCRIPTS_DIR="$(dirname "$0")/../data/auxiliary"
SQL_FILES=(
    "insert_cart_states.sql"
    "insert_category_names.sql"
    "insert_countries.sql"
    "insert_cities.sql"
    "insert_payment_providers.sql"
    "insert_payment_transactions.sql"
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

echo "All auxiliary type data loaded successfully!"
