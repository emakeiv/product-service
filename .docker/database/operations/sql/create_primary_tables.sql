CREATE TABLE IF NOT EXISTS "Customer" (
      id                SERIAL,
      first_name        VARCHAR(32) NOT NULL,
      last_name         VARCHAR(32) NOT NULL,
      phone_no          VARCHAR(16) NOT NULL,
      email_address     VARCHAR(64) NOT NULL,
      created_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      edited_at         TIMESTAMP,
      guest_expiry      TIMESTAMP,
      is_registered     BOOLEAN,
      
      CONSTRAINT pk_customer_id           PRIMARY KEY (id),
      CONSTRAINT unique_customer_email    UNIQUE (email_address)
);

CREATE TABLE IF NOT EXISTS  "CustomerAddress" (
      id                SERIAL,
      customer_id       INT NOT NULL, 
      city_id           INT NOT NULL,
      address_line_1    VARCHAR(32) NOT NULL,
      address_line_2    VARCHAR(64),

      CONSTRAINT pk_customer_address_id   PRIMARY KEY (id),
      CONSTRAINT fk_customer_id           FOREIGN KEY (customer_id)     REFERENCES "Customer"(id),
      CONSTRAINT fk_city                  FOREIGN KEY (city_id)         REFERENCES "City"(id)
);

CREATE TABLE IF NOT EXISTS  "User" (
      id                SERIAL,
      customer_id       INT,
      username          VARCHAR(64) NOT NULL,
      email             VARCHAR(64) NOT NULL,
      password          VARCHAR(64),
      created_at        TIMESTAMP            DEFAULT CURRENT_TIMESTAMP,
      last_login_ts     TIMESTAMP,
      roles             JSON        NOT NULL DEFAULT '[]',
      is_verified       BOOLEAN     NOT NULL DEFAULT FALSE,
      is_active         BOOLEAN,
      email_validated   BOOLEAN,
      phone_validated   BOOLEAN,

      CONSTRAINT pk_user_id         PRIMARY KEY (id),
      CONSTRAINT fk_customer_id     FOREIGN KEY (customer_id)     REFERENCES "Customer"(id),
      CONSTRAINT unique_uname_and_email  UNIQUE (username, email)
);

CREATE TABLE IF NOT EXISTS  "PaymentType"(
      id                SERIAL,
      customer_id       INT,
      provider_id       INT,
      name              VARCHAR(32),
      vendor_id         INT,
      expiry            TIMESTAMP,

      CONSTRAINT pk_payment_typeid  PRIMARY KEY (id),
      CONSTRAINT fk_customer_id     FOREIGN KEY (customer_id)     REFERENCES "Customer"(id),
      CONSTRAINT fk_provider_id     FOREIGN KEY (provider_id)     REFERENCES "PaymentProvider"(id)
);

CREATE TABLE IF NOT EXISTS  "Category" (
      id                SERIAL,
      category_name_id  INT,
      name              VARCHAR(16),
      description       VARCHAR(64),
      tag               VARCHAR(16),

      CONSTRAINT pk_category_id     PRIMARY KEY (id),
      CONSTRAINT fk_category_id     FOREIGN KEY (category_name_id) REFERENCES "CategoryName"(id)
);
CREATE TABLE IF NOT EXISTS  "Discount" (
      id                SERIAL,
      name              VARCHAR(16),
      type              VARCHAR(16),
      description       VARCHAR(64),
      percentage        DECIMAL(4,2),
      active            BOOLEAN,
      created_ts        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      active_until_ts   TIMESTAMP
      edited_ts         TIMESTAMP,
      deleted_ts        TIMESTAMP,

      CONSTRAINT pk_discout_id      PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS  "Product" (
      id          SERIAL,
      name        VARCHAR(16)  NOT NULL,
      description VARCHAR(64)  NOT NULL,
      cost_price  DECIMAL(7,2) NOT NULL CHECK (cost_price > 0),
      sell_price  DECIMAL(7,2) NOT NULL CHECK (sell_price > 0),
      sku         VARCHAR(16)  NOT NULL,
      category_id INT,
      discount_id INT,


      CONSTRAINT pk_product_id      PRIMARY KEY (id),
      CONSTRAINT fk_category_id     FOREIGN KEY (category_id) REFERENCES "Category"(id),
      CONSTRAINT fk_discount_id     FOREIGN KEY (discount_id) REFERENCES "Discount"(id)
);


CREATE TABLE IF NOT EXISTS  "Order" (
      id                SERIAL,
      customer_id       INT,
      date_placed       TIMESTAMP,
      date_shipped      TIMESTAMP,
      shipping_price    DECIMAL(7,2),

      CONSTRAINT pk_order_id        PRIMARY KEY (id),
      CONSTRAINT fk_customer_id     FOREIGN KEY (customer_id)     REFERENCES "Customer"(id)
);

CREATE TABLE IF NOT EXISTS  "OrderLine" (
      order_id    INT,
      product_id  INT,
      quantity    INT CHECK (quantity > 0),

      CONSTRAINT pk_order_line_id   PRIMARY KEY (order_id, product_id),
      CONSTRAINT fk_order_id        FOREIGN KEY (order_id)     REFERENCES "Order"(id),
      CONSTRAINT fk_product_id      FOREIGN KEY (product_id)   REFERENCES "Product"(id)
);


CREATE TABLE IF NOT EXISTS  "PaymentTransaction" (
      id                SERIAL,
      order_id          INT,
      type_id           INT,
      payment_date      TIMESTAMP,
      amount            DECIMAL(7,2),
      state_id          INT,

      CONSTRAINT pk_payment_transaction_id      PRIMARY KEY (id),
      CONSTRAINT fk_order_id                    FOREIGN KEY (order_id)  REFERENCES "Order"(id),
      CONSTRAINT fk_payment_type_id             FOREIGN KEY (type_id)   REFERENCES "PaymentType"(id),
      CONSTRAINT fk_payment_state_id            FOREIGN KEY (state_id)  REFERENCES "PaymentTransactionState"(id)
);

CREATE TABLE IF NOT EXISTS  "ShoppingSession" (
      id                SERIAL,     
      customer_id       INT,
      session_start     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      session_end       TIMESTAMP,
      cart_id           INT,
      
      CONSTRAINT pk_shopping_session_id   PRIMARY KEY (id),
      CONSTRAINT fk_customer_id           FOREIGN KEY (customer_id)     REFERENCES "Customer"(id)
      
);

CREATE TABLE IF NOT EXISTS  "Cart" (
      id          SERIAL,
      customer_id INT,
      created_ts  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      cart_state  INT,

      CONSTRAINT pk_cart_id         PRIMARY KEY (id),
      CONSTRAINT fk_customer_id     FOREIGN KEY (customer_id)     REFERENCES "Customer"(id),
      CONSTRAINT fk_cart_state_id   FOREIGN KEY (cart_state)      REFERENCES "CartState"(id)
);
CREATE TABLE IF NOT EXISTS  "CartItem" (
      cart_id     INT,
      product_id  INT,
      quantity    INT,

      CONSTRAINT pk_cart_item_id    PRIMARY KEY (cart_id, product_id),
      CONSTRAINT fk_cart_id         FOREIGN KEY (cart_id)         REFERENCES "Cart"(id),
      CONSTRAINT fk_product_id      FOREIGN KEY (product_id)      REFERENCES "Product"(id)
);
CREATE TABLE IF NOT EXISTS  "Barcode"(
      barcode     CHAR(13),
      product_id  INT,

      CONSTRAINT pk_barcode_id      PRIMARY KEY (barcode),
      CONSTRAINT fk_product_id      FOREIGN KEY (product_id) REFERENCES "Product"(id)
);
CREATE TABLE IF NOT EXISTS  "Inventory"(
      id          SERIAL,
      product_id  INT,
      quantity    INT CHECK (quantity >= 0),

      CONSTRAINT pk_invetory_id     PRIMARY KEY (id),
      CONSTRAINT fk_product_id      FOREIGN KEY (product_id) REFERENCES "Product"(id)
);


