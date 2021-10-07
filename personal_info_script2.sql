
CREATE TABLE Personal_Information (
    personalID int primary key,
    firstName varchar(255) not null,
    lastName varchar(255) not null,
    dateOfBirth date not null,
    medicareNumber int,
    medicareExpiry date,
    phoneNumber varchar(255),
    address varchar(255),
    city varchar(255),
    province varchar(255),
    postalCode varchar(255),
    citizenshipStatus varchar(255),
    email varchar(255),
  	infectionHistory varchar(255)
    
);