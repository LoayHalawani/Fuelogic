INSERT INTO Company VALUES
('co-01', 103123, 'Fuel Asia', 6265, 51426, 67, 17642198, 'hq-01', 'Asia'),
('co-02', 312312, 'Fuel Africa', 14047, 46825, 58, 16385244, 'hq-02', 'Africa'),
('co-03', 731733, 'Fuel N. America', 47883, 159687, 146, 55862793, 'hq-03', 'North America'),
('co-04', 973193, 'Fuel S. America', 118256, 396547, 49, 13865912, 'hq-04', 'South America'),
('co-05', 126321, 'Fuel Europe', 34741, 115853, 117, 40538461, 'hq-05', 'Europe'),
('co-06', 981123, 'Fuel Australia', 32946, 109852, 127, 38435113, 'hq-06', 'Australia');

INSERT INTO HQ VALUES
('hq-01', 'hq-01@fuel.com', 25713, 'China', 'Hong Kong', 'Nathan Road', 'Building 1'),
('hq-02', 'hq-02@fuel.com', 23412, 'Egypt', 'Cairo', 'Harb Street', 'Building 2'),
('hq-03', 'hq-03@fuel.com', 79843, 'Canada', 'Toronto', 'Danforth Avenue', 'Building 3'),
('hq-04', 'hq-04@fuel.com', 198273, 'Brazil', 'Rio De Janeiro', 'Rio Branco', 'Building 4'),
('hq-05', 'hq-05@fuel.com', 57926, 'Germany', 'Berlin', 'Kreuzberg', 'Building 5'),
('hq-06', 'hq-06@fuel.com', 54926, 'New Zealand', 'Wellington', 'Bowen Street', 'Building 6');

INSERT INTO Supplier VALUES
('sup-01', 'SupAsia1', 'sup-01@fuel.com', '12345', 'Benzene', 'China', 'Beijing', 'Chun Yueng Street', 'Building 7', 'bra-01'),
('sup-02', 'SupAsia2', 'sup-02@fuel.com', '22345', 'Diesel', 'China', 'Beijing', 'Dongcheng District', 'Building 8', 'bra-01'),
('sup-03', 'SupAfrica1', 'sup-03@fuel.com', '32345', 'Benzene', 'Egypt', 'Alexandria', 'Victor Emanuel Street', 'Building 9', 'bra-03'),
('sup-04', 'SupAfrica2', 'sup-04@fuel.com', '42345', 'Diesel', 'Egypt', 'Alexandria', 'Corniche Road', 'Building 10', 'bra-03'),
('sup-05', 'SupNorthAmerica1', 'sup-05@fuel.com', '52345', 'Benzene', 'Canada', 'Quebec', 'Saint-Roch District', 'Building 11', 'bra-05'),
('sup-06', 'SupNorthAmerica2', 'sup-06@fuel.com', '62345', 'Diesel', 'Canada', 'Quebec', 'Petit Champlain District', 'Building 12', 'bra-05'),
('sup-07', 'SupSouthAmerica1', 'sup-07@fuel.com', '72345', 'Benzene', 'Brazil', 'Sao Paulo', 'Rua Agusta District', 'Building 13', 'bra-07'),
('sup-08', 'SupSouthAmerica2', 'sup-08@fuel.com', '82345', 'Diesel', 'Brazil', 'Sau Paolo', 'Alameda Lorena District', 'Building 14', 'bra-07'),
('sup-09', 'SupEurope1', 'sup-09@fuel.com', '92345', 'Benzene', 'Germany', 'Munich', 'Maximilianstrasse Street', 'Building 15', 'bra-09'),
('sup-10', 'SupEurope2', 'sup-10@fuel.com', '102345', 'Diesel', 'Germany', 'Munich', 'Kaufingerstrasse Street', 'Building 16', 'bra-09'),
('sup-11', 'SupAustralia1', 'sup-11@fuel.com', '112345', 'Benzene', 'New Zealand', 'Auckland', 'Queen Street', 'Building 17', 'bra-11'),
('sup-12', 'SupAustralia2', 'sup-12@fuel.com', '122345', 'Diesel', 'New Zealand', 'Auckland', 'Parnell Street', 'Building 18', 'bra-11');

INSERT INTO Storage VALUES
('sto-00', 100, 83, 'Good temperature and humidity', 'loc-01', 'bra-01', 'Benzene'),
('sto-002', 100, 79, 'Good temperature and humidity', 'loc-02', 'bra-01', 'Diesel'),
('sto-003', 100, 85, 'Good temperature and humidity', 'loc-01', 'bra-02', 'Benzene'),
('sto-004', 100, 71, 'Good temperature and humidity', 'loc-02', 'bra-02', 'Diesel'),
('sto-005', 100, 56, 'Good temperature and humidity', 'loc-01', 'bra-03', 'Benzene'),
('sto-006', 100, 89, 'Good temperature and humidity', 'loc-02', 'bra-03', 'Diesel'),
('sto-007', 100, 95, 'Good temperature and humidity', 'loc-01', 'bra-04', 'Benzene'),
('sto-008', 100, 63, 'Good temperature and humidity', 'loc-02', 'bra-04', 'Diesel'),
('sto-009', 100, 84, 'Good temperature and humidity', 'loc-01', 'bra-05', 'Benzene'),
('sto-010', 100, 93, 'Good temperature and humidity', 'loc-02', 'bra-05', 'Diesel'),
('sto-011', 100, 49, 'Good temperature and humidity', 'loc-01', 'bra-06', 'Benzene'),
('sto-012', 100, 72, 'Good temperature and humidity', 'loc-02', 'bra-06', 'Diesel');

INSERT INTO Fuel VALUES
('Benzene', '1.24/l', '1.24/l'),
('Diesel', '1.13/l', '1.13/l');

INSERT INTO Branch VALUES
('bra-01', 'hq-01', 'China', 'Shanghai', 'Duolon Road', 'BLDG 1', 15427, 1879, 2, 'M', 'Y'),
('bra-02', 'hq-01', 'China', 'Shanghai', 'Sinan Roa', 'BLDG 2', 10285, 1253, 2, 'S', 'N'),
('bra-03', 'hq-02', 'Egypt', 'Giza', 'Hamdan Street', 'BLDG 3', 14047, 4214, 2, 'M', 'Y'),
('bra-04', 'hq-02', 'Egypt', 'Giza', 'Hosny Street', 'BLDG 4', 9365, 2809, 2, 'S', 'N'),
('bra-05', 'hq-03', 'Canada', 'Alberta', '101 Street', 'BLDG 5', 47906, 14364, 2, 'M', 'Y'),
('bra-06', 'hq-03', 'Canada', 'Alberta', '150 Street', 'BLDG 6', 31937, 9576, 2, 'S', 'N'),
('bra-07', 'hq-04', 'Brazil', 'Salvador', 'Barra District', 'BLDG 7', 118964, 35476, 2, 'M', 'Y'),
('bra-08', 'hq-04', 'Brazil', 'Salvador', 'Pelourn Dist.', 'BLDG 8', 79309, 23651, 2, 'S', 'N'),
('bra-09', 'hq-05', 'Germany', 'Hamburg', 'Cremon', 'BLDG 9', 34755, 10422, 2, 'M', 'Y'),
('bra-10', 'hq-05', 'Germany', 'Hamburg', 'Reimerstwiete', 'BLDG 10', 23170, 6948, 2, 'S', 'N'),
('bra-11', 'hq-06', 'New Zealand', 'Hamilton', 'Armagh Street', 'BLDG 11', 32955, 9883, 2, 'M', 'Y'),
('bra-12', 'hq-06', 'New Zealand', 'Hamilton', 'Beale Street', 'BLDG 12', 21970, 6589, 2, 'S', 'N');

INSERT INTO Truck VALUES
('G.GL883', '123ABCD456', 'co-01', 'bra-01', 'Benzene', 23),
('A.F023', '223ABCD456', 'co-01', 'bra-01', 'Diesel', 45),
('H.HM994', '323ABCD456', 'co-01', 'bra-02', 'Benzene', 36),
('B.G134', '423ABCD456', 'co-01', 'bra-02', 'Diesel', 52),
('395-BTN', '523ABCD456', 'co-02', 'bra-03', 'Benzene', 55),
('460-LOK', '623ABCD456', 'co-02', 'bra-03', 'Diesel', 31),
('615-AHA', '723ABCD456', 'co-02', 'bra-04', 'Benzene', 28),
('965-AYS', '823ABCD456', 'co-02', 'bra-04', 'Diesel', 38),
('WD-568', '923ABCD456', 'co-03', 'bra-05', 'Benzene', 26),
('BYTR-741', '1023ABCD456', 'co-03', 'bra-05', 'Diesel', 61),
('CEFW-925', '1123ABCD456', 'co-03', 'bra-06', 'Benzene', 65),
('BVK-2326', '1223ABCD456', 'co-03', 'bra-06', 'Diesel', 47),
('LSN4149', '1323ABCD456', 'co-04', 'bra-07', 'Benzene', 41),
('AOB1CD2', '1423ABCD456', 'co-04', 'bra-07', 'Diesel', 42),
('AYP197', '1523ABCD456', 'co-04', 'bra-08', 'Benzene', 59),
('AA2362', '1623ABCD456', 'co-04', 'bra-08', 'Diesel', 34),
('FRW-J-274', '1723ABCD456', 'co-05', 'bra-09', 'Benzene', 33),
('SAD-GH-18', '1823ABCD456', 'co-05', 'bra-09', 'Diesel', 29),
('PL-HB-6', '1923ABCD456', 'co-05', 'bra-10', 'Benzene', 60),
('WES-HH-10', '2023ABCD456', 'co-05', 'bra-10', 'Diesel', 70),
('CUT402', '2123ABCD456', 'co-06', 'bra-11', 'Benzene', 72),
('WISPA', '2223ABCD456', 'co-06', 'bra-11', 'Diesel', 66),
('K1W1-01', '2323ABCD456', 'co-06', 'bra-12', 'Benzene', 44),
('LSL-01', '2423ABCD456', 'co-06', 'bra-12', 'Diesel', 55);

INSERT INTO Consumer VALUES
('consu-01', 'CONS1', 'Hospital', 'co-01', '12345', 'China', 'Hangzhou', 'Hefang Street', 'BLDG 13'),
('consu-02', 'CONS2', 'Airport', 'co-01', '22345', 'China', 'Hangzhou', 'Zhongshan Road', 'BLDG 14'),
('consu-03', 'CONS3', 'Gas Station', 'co-02', '32345', 'Egypt', 'Luxor', 'Al Rawda Street', 'BLDG 15'),
('consu-04', 'CONS4', 'Generator', 'co-02', '42345', 'Egypt', 'Luxor', 'Television St', 'BLDG 16'),
('consu-05', 'CONS5', 'Hospital', 'co-03', '52345', 'Canada', 'BritishColumbia', 'Whitefish Road', 'BLDG 17'),
('consu-06', 'CONS6', 'Airport', 'co-03', '62345', 'Canada', 'BritishColumbia', 'Portage Road', 'BLDG 18'),
('consu-07', 'CONS7', 'Gas Station', 'co-04', '72345', 'Brazil', 'Campinas', 'Dr. MascarenhSt', 'BLDG 19'),
('consu-08', 'CONS8', 'Generator', 'co-04', '82345', 'Brazil', 'Campinas', 'MajSolon Street', 'BLDG 20'),
('consu-09', 'CONS9', 'Hospital', 'co-05', '92345', 'Germany', 'Frankfurt', 'Limpurger Street', 'BLDG 21'),
('consu-10', 'CONS10', 'Airport', 'co-05', '102345', 'Germany', 'Frankfurt', 'Robmarkt St', 'BLDG 22'),
('consu-11', 'CONS11', 'Gas Station', 'co-06', '112345', 'New Zealand', 'Tauranga', 'Freeburn Road', 'BLDG 23'),
('consu-12', 'CONS12', 'Generator', 'co-06', '122345', 'New Zealand', 'Tauranga', 'Pyes Pa Road', 'BLDG 24');

INSERT INTO Contract VALUES
('contr-01', 'Benzene', 83, '2021-01-02', '2021-01-01', 102.92, 'USD'),
('contr-02', 'Diesel', 79, '2021-01-04', '2021-01-03', 89.27, 'USD'),
('contr-03', 'Benzene', 61, '2021-02-02', '2021-02-01', 75.64, 'USD'),
('contr-04', 'Diesel', 62, '2021-02-04', '2021-02-03', 70.06, 'USD'),
('contr-05', 'Benzene', 85, '2021-01-06', '2021-01-05', 105.4, 'USD'),
('contr-06', 'Diesel', 71, '2021-01-08', '2021-01-07', 80.23, 'USD'),
('contr-07', 'Benzene', 63, '2021-02-06', '2021-02-05', 78.12, 'USD'),
('contr-08', 'Diesel', 64, '2021-02-08', '2021-02-07', 72.32, 'USD'),
('contr-09', 'Benzene', 56, '2021-01-10', '2021-01-09', 69.44, 'CAD'),
('contr-10', 'Diesel', 89, '2021-01-12', '2021-01-11', 100.57, 'CAD'),
('contr-11', 'Benzene', 65, '2021-02-10', '2021-02-09', 80.6, 'CAD'),
('contr-12', 'Diesel', 66, '2021-02-12', '2021-02-11', 74.58, 'CAD'),

INSERT INTO Bill VALUES
('Bill-001', 'co-01', 'consu-01', 'Benzene', 250, '2020-12-25', 'Cash', '$', 180120),
('Bill-002', 'co-02', 'consu-02', 'Benzene', 300, '2020-12-28', 'Check', '$', 90900),
('Bill-003', 'co-03', 'consu-03', 'Diesel', 400, '2020-11-28', 'Cash', '$', 30000),
('Bill-004', 'co-04', 'consu-04', 'Benzene', 400, '2020-09-25', 'Check', '$', 3000),
('Bill-005', 'co-04', 'consu-05', 'Benzene', 1000, '2020-08-25', 'Cash', '$', 3750);

INSERT INTO Employee VALUES
('emp-0001', 'co-01', 'Jenna', 'M', 'Walker', 'F', 'Accountant', 'wo-01', 'USD', 700),
('emp-0002', 'co-01', 'Connor', 'I', 'Gross', 'M', 'HR', 'wo-01', 'CAD', 850),
('emp-0003', 'co-02', 'Alaina', 'R', 'Rogers', 'F', 'CEO', 'wo-02', 'EUR', 1700),
('emp-0004', 'co-02', 'Cyrus', 'N', 'Huff', 'M', 'CFO', 'wo-02', 'AUD', 1200),
('emp-0005', 'co-03', 'Amira', 'F', 'English', 'F', 'CISO', 'wo-03', 'USD', 1200),
('emp-0006', 'co-03', 'Amiah', 'M', 'Huerta', 'F', 'Marketing', 'wo-03', 'CAD', 1000),
('emp-0007', 'co-04', 'Maliyah', 'A', 'Connor', 'F', 'Cashier', 'wo-04', 'EUR', 700),
('emp-0008', 'co-04', 'Mohammad', 'B', 'Arias', 'M', 'Manager', 'wo-04', 'AUD', 1200),
('emp-0009', 'co-05', 'Arnav', 'A', 'Buck', 'M', 'Janitor', 'wo-05', 'USD', 800),
('emp-0010', 'co-05', 'Shane', 'D', 'Wilkerson', 'M', 'Assistant', 'wo-05', 'CAD', 1000),
('emp-0011', 'co-06', 'Savanah', 'K', 'Glass', 'F', 'Janitor', 'wo-06', 'EUR', 800),
('emp-0012', 'co-06', 'Elisa', 'V', 'Mahoney', 'F', 'Cashier', 'wo-06', 'CAD', 1000);

INSERT INTO Relative VALUES
('emp-0001', 'Nelson', 24, 'Father', '031234', 'America', 'Orlando', NULL, NULL),
('emp-0002', 'Jaxon', 31, 'Uncle', '031235', 'Germany', 'Berlin', NULL, NULL),
('emp-0003', 'Cheyenne', 25, 'Sister', '031236', 'North Korea', 'Pyong Yang', NULL, NULL),
('emp-0004', 'Tanner', 35, 'Husband', '031237', 'Belgium', 'Brussels', NULL, NULL),
('emp-0005', 'Courtney', 24, 'Cousin', '031238', 'Argentina', 'Buenos Aires', NULL, NULL),
('emp-0006', 'Giada', 24, 'Fiance', '031239', 'Pakistan', 'Islamabad', NULL, NULL),
('emp-0007', 'Heaven', 29, 'Wife', '031241', 'Ireland', 'Dublin', NULL, NULL),
('emp-0008', 'Regina', 41, 'Sister', '031242', 'Italy', 'Rome', NULL, NULL),
('emp-0009', 'Thomas', 35, 'Brother', '031243', 'England', 'Manchester', NULL, NULL),
('emp-0010', 'Rebecca', 27, 'Mother', '031245', 'Mexico', 'Mexico City', NULL, NULL);

INSERT INTO Schedule VALUES
('emp-0001', '2021-01-01', '07:30 AM', '02:00 PM'),
('emp-0002', '2021-01-10', '07:30 AM', '02:00 PM'),
('emp-0003', '2021-01-05', '07:30 AM', '02:00 PM'),
('emp-0004', '2021-01-06', '08:30 AM', '02:00 PM'),
('emp-0005', '2021-01-05', '08:30 AM', '02:00 PM'),
('emp-0006', '2021-01-16', '07:30 AM', '01:00 PM'),
('emp-0007', '2021-01-17', '07:30 AM', '02:00 PM'),
('emp-0008', '2021-01-21', '07:30 AM', '02:30 PM'),
('emp-0009', '2021-01-26', '08:30 AM', '02:00 PM'),
('emp-0010', '2021-01-12', '07:30 AM', '02:00 PM');

INSERT INTO DeliversTo VALUES
('H.HM994', 'consu-01', '323ABCD456', '2021-02-01'),
('B.G134', 'consu-02', '423ABCD456', '2021-02-03'),
('615-AHA', 'consu-03', '723ABCD456', '2021-02-05'),
('965-AYS', 'consu-04', '823ABCD456', '2021-02-07'),
('CEFW-925', 'consu-05', '1123ABCD456', '2021-02-09'),
('BVK-2326', 'consu-06', '1223ABCD456', '2021-02-11'),
('AYP197', 'consu-07', '1523ABCD456', '2021-02-13'),
('AA2362', 'consu-08', '1623ABCD456', '2021-02-15'),
('PL-HB-6', 'consu-09', '1923ABCD456', '2021-02-17'),
('WES-HH-10', 'consu-10', '2023ABCD456', '2021-02-19'),
('K1W1-01', 'consu-11', '2323ABCD456', '2021-02-21'),
('LSN4149', 'consu-12', '1323ABCD456', '2021-02-23');

INSERT INTO EmployeePhoneNb VALUES
('emp-0001', '76123456'),
('emp-0001', '76125545'),
('emp-0002', '76004464'),
('emp-0002', '76123123'),
('emp-0003', '76001456'),
('emp-0003', '76167892'),
('emp-0004', '78124256'),
('emp-0004', '81123456'),
('emp-0005', '71177756'),
('emp-0005', '03144677'),
('emp-0006', '80313414'),
('emp-0006', '83173831'),
('emp-0007', '39137391'),
('emp-0007', '31838383'),
('emp-0008', '03193903'),
('emp-0008', '31038139'),
('emp-0009', '31039193'),
('emp-0009', '01301030'),
('emp-0010', '31393103'),
('emp-0010', '56113813');

INSERT INTO BranchPhoneNb VALUES
('bra-01', '76123456'),
('bra-01', '76125545'),
('bra-02', '76004464'),
('bra-02', '76123123'),
('bra-03', '76001456'),
('bra-03', '76167892'),
('bra-04', '78124256'),
('bra-04', '81123456'),
('bra-05', '71177756'),
('bra-05', '03144677'),
('bra-06', '41515155'),
('bra-06', '51514944'),
('bra-07', '19381931'),
('bra-07', '41019411'),
('bra-08', '41401941'),
('bra-08', '10239713'),
('bra-09', '01302401'),
('bra-09', '01300913'),
('bra-10', '90137255'),
('bra-10', '01340695');

INSERT INTO HQPhoneNb VALUES
('hq-01', '07113445'),
('hq-02', '07153445'),
('hq-02', '01113445'),
('hq-03', '08113445'),
('hq-03', '07113445'),
('hq-04', '07113555'),
('hq-05', '71117745'),
('hq-05', '09113445'),
('hq-06', '01144445'),
('hq-06', '03113445');

INSERT INTO SupplierPhoneNb VALUES
('sup-01', '71999911'),
('sup-02', '71944444'),
('sup-02', '03785511'),
('sup-03', '78498651'),
('sup-04', '71985652'),
('sup-04', '03978511'),
('sup-05', '25252525'),
('sup-05', '52525255'),
('sup-06', '71513468'),
('sup-07', '41415155'),
('sup-08', '83018310'),
('sup-09', '01383813'),
('sup-10', '51885155'),
('sup-11', '14441104'),
('sup-12', '31031331');

INSERT INTO Makes VALUES
('contr-01', 'consu-01', 'sup-01'),
('contr-02', 'consu-02', 'sup-02'),
('contr-03', 'consu-03', 'sup-03'),
('contr-04', 'consu-04', 'sup-04'),
('contr-05', 'consu-05', 'sup-05'),
('contr-06', 'consu-06', 'sup-06'),
('contr-07', 'consu-07', 'sup-07'),
('contr-08', 'consu-08', 'sup-08'),
('contr-09', 'consu-09', 'sup-09'),
('contr-10', 'consu-10', 'sup-10'),
('contr-11', 'consu-11', 'sup-11'),
('contr-12', 'consu-12', 'sup-12');
