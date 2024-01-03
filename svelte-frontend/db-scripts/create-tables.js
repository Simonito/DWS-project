const create_tables = `
-- This script was generated by the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
-- BEGIN;

-- Create database
CREATE DATABASE IF NOT EXISTS demo;

-- Connect to the demo database
\c demo;


CREATE TABLE IF NOT EXISTS public.categories
(
    category_id uuid NOT NULL,
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT categories_pkey PRIMARY KEY (category_id),
    CONSTRAINT categories_name_key UNIQUE (name)
);

CREATE TABLE IF NOT EXISTS public.expenses
(
    expense_id uuid NOT NULL,
    user_id uuid NOT NULL,
    category_id uuid NOT NULL,
    amount numeric,
    paid_at timestamp with time zone,
    created_at timestamp with time zone,
    CONSTRAINT expenses_pkey PRIMARY KEY (expense_id)
);

CREATE TABLE IF NOT EXISTS public.users
(
    user_id uuid NOT NULL,
    username character varying(255) COLLATE pg_catalog."default" NOT NULL,
    password character varying(255) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT users_pkey PRIMARY KEY (user_id)
);

ALTER TABLE IF EXISTS public.expenses
    ADD CONSTRAINT expenses_category_id_fkey FOREIGN KEY (category_id)
    REFERENCES public.categories (category_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.expenses
    ADD CONSTRAINT expenses_user_id_fkey FOREIGN KEY (user_id)
    REFERENCES public.users (user_id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;

-- END;

`;

export default create_tables;