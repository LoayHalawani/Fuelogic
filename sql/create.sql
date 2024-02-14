CREATE TABLE HQ (
    ID CHAR(5),
	Email VARCHAR(MAX),
	Nb_of_employees INT,
	Country VARCHAR(MAX) NOT NULL,
	City VARCHAR(MAX),
	Street VARCHAR(MAX),
	Building VARCHAR(MAX),
	PRIMARY KEY (ID)
);

CREATE TABLE Company (
	ID CHAR(5),
	RegistrationNb INT,
	Name VARCHAR(MAX),
	Nb_of_trucks INT,
	Nb_of_employees INT,
	Nb_of_branches INT,
	TotalIncome INT,
	HeadquarterID CHAR(5),
	Continent VARCHAR(MAX),
	PRIMARY KEY (ID),
	FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE Branch (
    ID CHAR(6),	
	HeadquarterID CHAR(5),
	Country VARCHAR(MAX),
	City VARCHAR(MAX),
	Street VARCHAR(MAX),
	Building VARCHAR(MAX),
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
	Name VARCHAR(MAX) NOT NULL,
	Email VARCHAR(MAX),
	Fax VARCHAR(MAX),
	FuelType VARCHAR(MAX) NOT NULL,
	Country VARCHAR(MAX),
	City VARCHAR(MAX),
	Street VARCHAR(MAX),
	Building VARCHAR(MAX),
	BranchID CHAR(6),
	PRIMARY KEY (ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE Fuel (
	Type VARCHAR(MAX),
	SellingPrice VARCHAR(MAX) NOT NULL,
	BuyingPrice VARCHAR(MAX) NOT NULL,
	PRIMARY KEY (Type)
);

CREATE TABLE Storage (
	ID CHAR(7),
	Capacity INT NOT NULL,
	CurrentCapacity INT,
	StoringConditions VARCHAR(MAX),
	LocationID CHAR(6),
	BranchID CHAR(6),
	FuelType VARCHAR(MAX),
	PRIMARY KEY (ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Truck (
	PlateNb CHAR(9),	
	VINCode CHAR(17) NOT NULL UNIQUE,
	CompanyID CHAR(5),
	BranchID CHAR(6),
	FuelType VARCHAR(MAX),
	Capacity INT,
	PRIMARY KEY (PlateNb),
	FOREIGN KEY (CompanyID) REFERENCES Company(ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Consumer (
	ID CHAR(8),
	Name VARCHAR(MAX) NOT NULL,
	Type VARCHAR(MAX),
	CompanyID CHAR(5),
	PhoneNb INT,
	Country VARCHAR(MAX),
	City VARCHAR(MAX),
	Street VARCHAR(MAX),
	Building VARCHAR(MAX),
	PRIMARY KEY (ID)
);

CREATE TABLE Contract (
	ID CHAR(8), 
	FuelType VARCHAR(MAX),
	FuelAmount INT,
	ReceptionDate DATE,
	SignatureDate DATE,
	Amount INT,
	Currency CHAR(3),
	PRIMARY KEY (ID)
);

CREATE TABLE Bill (
	BillNb CHAR(8),
	CompanyID CHAR(5),	
	ConsumerID CHAR(8),
	FuelType VARCHAR(MAX) NOT NULL,
	FuelAmount INT NOT NULL,
	PaymentDate DATE,
	PaymentMethod VARCHAR(MAX) NOT NULL,
	Currency CHAR NOT NULL,
	Amount INT NOT NULL,
	PRIMARY KEY (BillNb),
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID) 
);

CREATE TABLE Employee (
    ID CHAR(8),
	CompanyID CHAR(5),	 
	FirstName VARCHAR(MAX) NOT NULL,
	MiddleName CHAR,
	LastName VARCHAR(MAX) NOT NULL,
	Gender CHAR NOT NULL CHECK (Gender IN ('F', 'M')), 
	Job VARCHAR(MAX) NOT NULL,
	WorkplaceID CHAR(5),
	Currency VARCHAR(MAX),
	Amount INT,
	PRIMARY KEY (ID),
	FOREIGN KEY (CompanyID) REFERENCES Company(ID)
);

CREATE TABLE Relative (
	EmployeeID CHAR(8),
	Name VARCHAR(10),
	Age INT,
	Relationship VARCHAR(MAX) NOT NULL,
	PhoneNb VARCHAR(MAX) NOT NULL,
	Country VARCHAR(MAX),
	City VARCHAR(MAX),
	Street VARCHAR(MAX),
	Building VARCHAR(MAX),
	PRIMARY KEY (EmployeeID, Name),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

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
	TruckVINCode CHAR(17),
	Date DATE,
	PRIMARY KEY (TruckPlateNb, ConsumerID),
	FOREIGN KEY (TruckVINCode) REFERENCES Truck(VINCode),
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID)
);

CREATE TABLE EmployeePhoneNb (
	EmployeeID CHAR(8),
	PhoneNb CHAR(8),
	PRIMARY KEY (EmployeeID, PhoneNb),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE BranchPhoneNb (
	BranchID CHAR(6),
	PhoneNb CHAR(8),
	PRIMARY KEY (BranchID, PhoneNb),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE HQPhoneNb (
	HeadquarterID CHAR(5),
	PhoneNb CHAR(8),
	PRIMARY KEY (HeadquarterID, PhoneNb),
	FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE SupplierPhoneNb (
	SupplierID CHAR(6),
	PhoneNb CHAR(8),
	PRIMARY KEY (SupplierID, PhoneNb),
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
