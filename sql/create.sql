// VARCHAR(MAX) is not allowed in mysql it only works for microsoft sql, it should be varchar(255)

CREATE TABLE HQ (
    ID CHAR(5),
	Email VARCHAR(255),
	Nb_of_employees INT,
	Country VARCHAR(255) NOT NULL,
	City VARCHAR(255),
	Street VARCHAR(255),
	Building VARCHAR(255),
	PRIMARY KEY (ID)
);

CREATE TABLE Company (
	ID CHAR(5),
	RegistrationNb INT,
	Nb_of_trucks INT,
	Nb_of_employees INT,
	Nb_of_branches INT,
	TotalIncome INT,
	HeadquarterID CHAR(5),
	Continent VARCHAR(255),
	Name VARCHAR(255),
	PRIMARY KEY (ID),
	FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID),
);

CREATE TABLE Branch (
    ID CHAR(6),	
	HeadquarterID CHAR(5),
	Country VARCHAR(255),
	City VARCHAR(255),
	Street VARCHAR(255),
	Building VARCHAR(255),
	Nb_of_employees INT,
	Nb_of_trucks INT,
	Nb_of_storages INT,
	Status CHAR NOT NULL CHECK (STATUS IN ('M', 'S')),
	Refuels CHAR NOT NULL CHECK (REFUELS IN ('Y', 'N')),
	PRIMARY KEY (ID),
    FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE Supplier ( 
    ID CHAR(6),
	Name VARCHAR(255) NOT NULL,
	Email VARCHAR(255),
	FuelType VARCHAR(255) NOT NULL,
	Country VARCHAR(255),
	City VARCHAR(255),
	BranchID CHAR(6),
	PRIMARY KEY (ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE Fuel (
	Type VARCHAR(255),
	SellingPrice VARCHAR(255) NOT NULL,
	BuyingPrice VARCHAR(255) NOT NULL,
	PRIMARY KEY (Type)
);

CREATE TABLE Storage (
	ID CHAR(7),
	Capacity INT NOT NULL,
	CurrentCapacity INT,
	StoringConditions VARCHAR(255),
	LocationID CHAR(6),
	BranchID CHAR(6),
	FuelType VARCHAR(255),
	PRIMARY KEY (ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Truck (
	PlateNb CHAR(9),
	CompanyID CHAR(5),
	BranchID CHAR(6),
	FuelType VARCHAR(255),
	Capacity INT,
	PRIMARY KEY (PlateNb),
	FOREIGN KEY (CompanyID) REFERENCES Company_A(ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Consumer (
	ID CHAR(8),
	Name VARCHAR(255) NOT NULL,
	Type VARCHAR(255),
	CompanyID CHAR(5),
	PhoneNb INT,
	Country VARCHAR(255),
	City VARCHAR(255),
	Street VARCHAR(255),
	Building VARCHAR(255),
	PRIMARY KEY (ID),
	FOREIGN KEY (CompanyID) REFERENCES Company(ID)
);

CREATE TABLE Contract (
	ID CHAR(8), 
	FuelType VARCHAR(255),
	FuelAmount INT,
	ReceptionDate DATE,
	SignatureDate DATE,
	Price INT,
	Currency CHAR(3),
	PRIMARY KEY (ID)
);

CREATE TABLE Bill (
	BillNb CHAR(8),
	CompanyID CHAR(5),	
	ConsumerID CHAR(8),
	FuelType VARCHAR(255) NOT NULL,
	FuelAmount INT NOT NULL,
	PaymentDate DATE,
	PaymentMethod VARCHAR(255) NOT NULL,
	Currency CHAR NOT NULL,
	Price INT NOT NULL,
	PRIMARY KEY (BillNb),
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID) 
);

CREATE TABLE Employee (
    ID CHAR(8),
	CompanyID CHAR(5),	 
	FirstName VARCHAR(255) NOT NULL,
	MiddleName CHAR,
	LastName VARCHAR(255) NOT NULL,
	Gender CHAR NOT NULL CHECK (Gender IN ('F', 'M')),
	Email VARCHAR(255) NOT NULL,
	Age INT,
	Job VARCHAR(255) NOT NULL,
	Salary INT,
	WorkplaceID CHAR(5),
	Address VARCHAR(255),
	PRIMARY KEY (ID),
	FOREIGN KEY (CompanyID) REFERENCES Company(ID)
);

CREATE TABLE Relative (
	EmployeeID CHAR(8),
	Name VARCHAR(10),
	Age INT,
	Relationship VARCHAR(255) NOT NULL,
	PhoneNb VARCHAR(255) NOT NULL,
	Country VARCHAR(255),
	City VARCHAR(255),
	Street VARCHAR(255),
	Building VARCHAR(255),
	PRIMARY KEY (EmployeeID, Name),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

// RELATIONS

CREATE TABLE Schedule (
	EmployeeID CHAR(8),
	ScheduleDate DATE,
	StartTime CHAR(8) NOT NULL,
	EndTime CHAR(8) NOT NULL,
	PRIMARY KEY (EmployeeID, ScheduleDate),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE DeliversTo (
	TruckPlateNb CHAR(9),
	ConsumerID CHAR(8),
	Date DATE,
	PRIMARY KEY (TruckPlateNb, ConsumerID),
	FOREIGN KEY (TruckPlateNb) REFERENCES PlateNb(ID),
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID)
);

// ensures that the employee can have multiple phone numbers
CREATE TABLE Employee_phone_nb (
	EmployeeID CHAR(8),
	PhoneNb VARCHAR(255) NOT NULL,
	PRIMARY KEY (EmployeeID, PhoneNb),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE Branch_phone_nb (
	BranchID CHAR(6),
	PhoneNb VARCHAR(255) NOT NULL,
	PRIMARY KEY (BranchID, PhoneNb),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE HQ_phone_nb (
	HqID CHAR(5),
	PhoneNb VARCHAR(255) NOT NULL,
	PRIMARY KEY (HqID, PhoneNb),
	FOREIGN KEY (HqID) REFERENCES HQ(ID)
);

CREATE TABLE Supplier_phone_nb (
	SupplierID CHAR(6),
	PhoneNb VARCHAR(255) NOT NULL,
	PRIMARY KEY (HqID, PhoneNb),
	FOREIGN KEY (SupplierID) REFERENCES Supplier(ID)
);

CREATE TABLE Makes (
	ContractID CHAR(8),
	ConsumerID CHAR(8),
	SupplierID CHAR(6),
	PRIMARY KEY (ContractID, ConsumerID, SupplierID),
	FOREIGN KEY (ContractID) REFERENCES Contract(ID),
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID),
	FOREIGN KEY (SupplierID) REFERENCES Supplier(ID)
);
