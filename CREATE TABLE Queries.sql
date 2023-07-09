CREATE TABLE HQ (
    ID CHAR(5) PRIMARY KEY,
	Email VARCHAR(15),
	Nb_of_employees SMALLINT,
	Country VARCHAR(15) NOT NULL,
	City VARCHAR(15),
	Street VARCHAR(15),
	Building VARCHAR(15)
);

CREATE TABLE Company (
	ID CHAR(5) PRIMARY KEY,
	RegistrationNb INT,
	Name VARCHAR(15),
	Nb_of_trucks SMALLINT,
	Nb_of_employees SMALLINT,
	Nb_of_branches SMALLINT,
	TotalIncome SMALLINT,
	HeadquarterID CHAR(5),
	Continent VARCHAR(15),
	FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE Branch (
    ID CHAR(6) PRIMARY KEY,	
	HeadquarterID CHAR(5),
	Country VARCHAR(15),
	City VARCHAR(15),
	Street VARCHAR(15),
	Building VARCHAR(15),
	Nb_of_employees SMALLINT,
	Nb_of_trucks SMALLINT,
	Nb_of_storages SMALLINT,
	Status CHAR NOT NULL CHECK (STATUS IN ('M', 'S')),
	Refuels CHAR NOT NULL CHECK (REFUELS IN ('Y', 'N')),
    FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE Supplier ( 
    ID CHAR(6) PRIMARY KEY,
	Name VARCHAR(15) NOT NULL,
	Email VARCHAR(15),
	Fax VARCHAR(15),
	FuelType VARCHAR(15) NOT NULL,
	Country VARCHAR(15),
	City VARCHAR(15),
	Street VARCHAR(15),
	Building VARCHAR(15),
	BranchID CHAR(6),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE Fuel (
	Type VARCHAR(15) PRIMARY KEY,
	SellingPrice VARCHAR(7) NOT NULL,
	BuyingPrice VARCHAR(7) NOT NULL,
);

CREATE TABLE Storage (
	ID CHAR(7) PRIMARY KEY,
	Capacity SMALLINT NOT NULL,
	CurrentCapacity SMALLINT,
	StoringConditions VARCHAR(30),
	LocationID CHAR(6),
	BranchID CHAR(6),
	FuelType VARCHAR(15),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Truck (
	PlateNb CHAR(9) PRIMARY KEY,	
	VINCode CHAR(17) NOT NULL UNIQUE,
	CompanyID CHAR(5),
	BranchID CHAR(6),
	FuelType VARCHAR(15),
	Capacity SMALLINT,
	FOREIGN KEY (CompanyID) REFERENCES Company(ID),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID),
	FOREIGN KEY (FuelType) REFERENCES Fuel(Type) 
);

CREATE TABLE Consumer (
	ID CHAR(8) PRIMARY KEY,
	Name VARCHAR(15) NOT NULL,
	Type VARCHAR(15),
	CompanyID CHAR(5),
	PhoneNb SMALLINT,
	Country VARCHAR(15),
	City VARCHAR(15),
	Street VARCHAR(15),
	Building VARCHAR(15)
);

CREATE TABLE Contract (
	ID CHAR(8) PRIMARY KEY, 
	FuelType VARCHAR(15),
	FuelAmount SMALLINT,
	ReceptionDate DATE,
	SignatureDate DATE,
	Amount SMALLINT,
	Currency CHAR(3)
);

CREATE TABLE Bill (
	BillNb CHAR(8) PRIMARY KEY,
	CompanyID CHAR(5),	
	ConsumerID CHAR(8),
	FuelType VARCHAR(15) NOT NULL,
	FuelAmount SMALLINT NOT NULL,
	PaymentDate DATE,
	PaymentMethod VARCHAR(15) NOT NULL,
	Currency CHAR NOT NULL,
	Amount SMALLINT NOT NULL,
	FOREIGN KEY (ConsumerID) REFERENCES Consumer(ID) 
);

CREATE TABLE Employee (
    ID CHAR(8) PRIMARY KEY,
	CompanyID CHAR(5),	 
	FirstName VARCHAR(15) NOT NULL,
	MiddleName CHAR,
	LastName VARCHAR(15) NOT NULL,
	Gender CHAR NOT NULL CHECK (Gender IN ('F', 'M')), 
	Job VARCHAR(15) NOT NULL,
	WorkplaceID CHAR(5),
	Currency VARCHAR(5),
	Amount SMALLINT,
	FOREIGN KEY (CompanyID) REFERENCES Company(ID)
);

CREATE TABLE Relative (
	EmployeeID CHAR(8),
	Name VARCHAR(15),
	Age SMALLINT,
	Relationship VARCHAR(10) NOT NULL,
	PhoneNb VARCHAR(15) NOT NULL,
	Country VARCHAR(15),
	City VARCHAR(15),
	Street VARCHAR(15),
	Building VARCHAR(15),
	PRIMARY KEY (EmployeeID, Name),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE Schedule (
	EmployeeID CHAR(8),
	ScheduleDate DATE,
	StartTime CHAR(11) NOT NULL,
	EndTime CHAR(11) NOT NULL,
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
	PhoneNb VARCHAR(15),
	PRIMARY KEY (EmployeeID, PhoneNb),
	FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE BranchPhoneNb (
	BranchID CHAR(6),
	PhoneNb VARCHAR(15),
	PRIMARY KEY (BranchID, PhoneNb),
	FOREIGN KEY (BranchID) REFERENCES Branch(ID)
);

CREATE TABLE HQPhoneNb (
	HeadquarterID CHAR(5),
	PhoneNb VARCHAR(15),
	PRIMARY KEY (HeadquarterID, PhoneNb),
	FOREIGN KEY (HeadquarterID) REFERENCES HQ(ID)
);

CREATE TABLE SupplierPhoneNb (
	SupplierID CHAR(6),
	PhoneNb VARCHAR(15),
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
