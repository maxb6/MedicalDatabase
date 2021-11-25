CREATE TABLE comp353.person (
    id int AUTO_INCREMENT primary key,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    date_of_birth date not null,
    medicare_number int,
    medicare_issue date,
    medicare_expiry date,
    phone_number varchar(255),
    street_address varchar(255),
    city varchar(255),
    province varchar(255),
    postal_code varchar(255),
    citizenship varchar(255),
    email varchar(255),
    age_group int
);

CREATE TABLE comp353.worker (
    id int AUTO_INCREMENT primary key,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    ssn int,
    hourly_wage int,
    worker_type varchar(255),
    is_eligible_to_vaccinate varchar(255)
);

CREATE TABLE comp353.infection_history(
    id int primary key,
    variant_name varchar(255)
);

CREATE TABLE comp353.age_group(
    id int AUTO_INCREMENT primary key,
    group_number int,
    age_range varchar(255)
);

CREATE Table comp353.infection_variant(
    id int primary key,
    variant_name varchar(255)
);

CREATE TABLE comp353.province(
    id int AUTO_INCREMENT primary key,
    province_name varchar(255),
    ageGroup int
);

CREATE TABLE comp353.facility(
    id int AUTO_INCREMENT primary key,
    facility_name varchar(255),
    street_address varchar(255),
    phone_number int,
    web_address varchar(255),
    facility_type varchar(255),
    capacity int,
    operating_hours varchar(255),
    operating_days varchar(255),
    manager_id int,
    appointment_type varchar(255)
);

CREATE TABLE comp353.appointment(
    id int AUTO_INCREMENT primary key,
    facility_name varchar(255),
    first_name varchar(255),
    last_name varchar(255),
    medicare_number int,
    appointment_date date,
    appointment_time time,
    vaccine_type varchar(255),
    dose_number int,
    lot varchar(255)
);

CREATE TABLE comp353.vaccine_type(
    id int AUTO_INCREMENT primary key,
    vaccine_name varchar(255)
);

CREATE TABLE comp353.assignment(
    id int AUTO_INCREMENT primary key,
    worker_id int,
    start_date date,
    end_date date,
    facility varchar(255)
);

