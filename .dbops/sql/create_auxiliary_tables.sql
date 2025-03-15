CREATE TABLE IF NOT EXISTS "Country"(
      id          SERIAL,
      code        INT,
      name        VARCHAR(32),

      CONSTRAINT country_pk_id      PRIMARY KEY (id),
      CONSTRAINT uni_country_code   UNIQUE (code)
);
CREATE TABLE IF NOT EXISTS "City" (
      id          SERIAL,
      country_id  INT,
      code        INT,
      name        VARCHAR(32),

      CONSTRAINT city_pk_id         PRIMARY KEY (id),
      CONSTRAINT fk_country_id      FOREIGN KEY (country_id) REFERENCES "Country"(id),
      CONSTRAINT uni_city_code      UNIQUE (code)
);
CREATE TABLE IF NOT EXISTS "CartState"(
      id    SERIAL,
      name  VARCHAR(32),
      
      CONSTRAINT cart_state_pk_id PRIMARY KEY (id),
      CONSTRAINT uni_cart_state_name UNIQUE (name)
);

CREATE TABLE IF NOT EXISTS "PaymentProvider"(
      id    SERIAL,
      code  INT,
      name  VARCHAR(32),

      CONSTRAINT provider_pk_id     PRIMARY KEY (id),
      CONSTRAINT uni_provider_code  UNIQUE (code)
);

CREATE TABLE IF NOT EXISTS "PaymentTransactionState"(
      id    SERIAL,
      name  VARCHAR(32),

      CONSTRAINT trans_state_pk_id  PRIMARY KEY (id),
      CONSTRAINT uni_state_name     UNIQUE (name)
);
CREATE TABLE IF NOT EXISTS "CategoryName"(
      id    SERIAL,
      name  VARCHAR(32),

      CONSTRAINT cat_name_pk_id     PRIMARY KEY (id),
      CONSTRAINT uni_category_name  UNIQUE (name)
);