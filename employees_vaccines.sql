CREATE TABLE VaccineInformation (
    personalID int primary key,
    medicareNumber int,
    infectionHistory varchar(255),
    vaccineType varchar(255),
    employee1stDose varchar(255),
    lotNumber1stDose int,
    date1stDose date,
    location1stDose varchar(255),
    employee2ndDose varchar(255),
    lotNumber2ndDose int,
    date2ndDose date,
    location2ndDose varchar(255)
    
);

CREATE TABLE VaccineTypes (
    vaccineType varchar(255),
    vaccineStatus bool,
    suspensionDate date
    
);

CREATE TABLE VaccineLocations (
	locationID int primary key,
    locationName varchar(255),
    locationAddress varchar(255),
    phoneNumber int,
    webAddress varchar(255),
    locationType varchar(255),
    capacity int,
    locationEmployees varchar(255),
    locationManager varchar(255)
    
);

CREATE TABLE EmployeeInformation (
    employeeID int primary key,
    currentFacilities varchar(255),
    workStartDate date,
    workEndDate date,
   	workerType varchar(255),
  	vaccinationStatus bool
    
);







