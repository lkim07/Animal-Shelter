drop table Socialize;
drop table FosterPeriod;
drop table Give;
drop table CheckUp;
drop table Stock;
drop table Feed;
drop table FosterFamily;
drop table Donor;
drop table Supporter;
drop table Food;
drop table Volunteer;
drop table Employee;
drop table StaffManages;
drop table Dog;
drop table Cat;
drop table Animal;
drop table AdopterContact;
drop table AdopterInfo;
drop table Veterinarian;
drop table Shelter;

CREATE TABLE Shelter(
    branchNum           INT PRIMARY KEY,
    shelterAddress      CHAR(80) NOT NULL
);

CREATE TABLE Veterinarian(
    licenseNum      CHAR(10)     PRIMARY KEY,
    vetName         CHAR(20),
    vetPhone        CHAR(20)	NOT NULL
);

CREATE TABLE AdopterInfo(
    adopterPhone    CHAR(20)     PRIMARY KEY,
    adopterName     CHAR(25),
    adopterAddress  CHAR(80)
);

CREATE TABLE AdopterContact(
    applicantID     CHAR(8)     PRIMARY KEY,
    adopterPhone     CHAR(20)  NOT NULL,
    FOREIGN KEY (adopterPhone) REFERENCES AdopterInfo ON DELETE CASCADE
);

CREATE TABLE Animal(
    animalID        CHAR(6)     PRIMARY KEY,
    animalName      CHAR(20)     NOT NULL,
    arrivalDate     DATE        NOT NULL,
    gender          CHAR(80),
    age             INT,
    status          CHAR(20)     NOT NULL,
    branchNum       INT   NOT NULL,
    applicantID     CHAR(8),
    FOREIGN KEY (branchNum) REFERENCES Shelter ON DELETE CASCADE,
    FOREIGN KEY (applicantID) REFERENCES AdopterContact ON DELETE CASCADE
);

CREATE TABLE Cat(
    animalID    CHAR(6)     PRIMARY KEY,
    catBreed    CHAR(20),
    FOREIGN KEY (animalID) REFERENCES Animal ON DELETE CASCADE
);

CREATE TABLE Dog(
    animalID    CHAR(6)     PRIMARY KEY,
    dogBreed   CHAR(20),
    FOREIGN KEY (animalID) REFERENCES Animal ON DELETE CASCADE
);

CREATE TABLE StaffManages(
    staffID         CHAR(6)     PRIMARY KEY,
    staffName       CHAR(20),
    email           CHAR(80)     NOT NULL,
    branchNum       INT   NOT NULL,
    position        CHAR(50),
    FOREIGN KEY (branchNum) REFERENCES Shelter ON DELETE CASCADE
);

CREATE TABLE Employee(
    staffID     CHAR(6)     PRIMARY KEY,
    salary      CHAR(20),
    FOREIGN KEY (staffID) REFERENCES StaffManages ON DELETE CASCADE
);

CREATE TABLE Volunteer(
    staffID             CHAR(6)     PRIMARY KEY,
    hoursVolunteered    INT,
    FOREIGN KEY (staffID) REFERENCES StaffManages ON DELETE CASCADE
);

CREATE TABLE Food(
    UPC         CHAR(10)     PRIMARY KEY,
    target      CHAR(10)     NOT NULL,
    productName CHAR(50),
    stock       INT   NOT NULL
);

CREATE TABLE Supporter(
    membershipID    CHAR(6)     PRIMARY KEY,
    supporterName   CHAR(20),
    supporterPhone  CHAR(20)     NOT NULL
);


CREATE TABLE Donor(
    membershipID    CHAR(6)    PRIMARY KEY,
    FOREIGN KEY (membershipID) REFERENCES Supporter ON DELETE CASCADE
);

CREATE TABLE FosterFamily(
    membershipID     CHAR(6)    PRIMARY KEY,
    familyAddress   CHAR(80),
    FOREIGN KEY (membershipID) REFERENCES Supporter ON DELETE CASCADE
);

CREATE TABLE Feed(
    animalID     CHAR(6),
    staffID      CHAR(6),
    feedDate    DATE ,
    time        INT,
    PRIMARY KEY (staffID, animalID),
    FOREIGN KEY (staffID) REFERENCES StaffManages ON DELETE CASCADE,
    FOREIGN KEY (animalID) REFERENCES Animal ON DELETE CASCADE
);

CREATE TABLE Stock(
    staffID     CHAR(6),
    UPC         CHAR(10),
    PRIMARY KEY(staffID, UPC),
    FOREIGN KEY (staffID) REFERENCES StaffManages ON DELETE CASCADE,
    FOREIGN KEY (UPC) REFERENCES Food ON DELETE CASCADE
);

CREATE TABLE CheckUp(
    licenseNum      CHAR(10),
    animalID        CHAR(6),
    checkupDate     DATE,
    assessment      CHAR(15),
    PRIMARY KEY (licenseNum, animalID),
    FOREIGN KEY (animalID) REFERENCES Animal ON DELETE CASCADE,
    FOREIGN KEY (licenseNum) REFERENCES Veterinarian ON DELETE CASCADE
);

CREATE TABLE Give(
    membershipID    CHAR(6),
    UPC CHAR(10),
    givenDate       DATE,
    quantity        INT	NOT NULL,
    PRIMARY KEY(membershipID, UPC),
    FOREIGN KEY (membershipID) REFERENCES Donor ON DELETE CASCADE,
    FOREIGN KEY (UPC) REFERENCES Food ON DELETE CASCADE
);

CREATE TABLE FosterPeriod(
    startDate   DATE    PRIMARY KEY,
    endDate   DATE 
);

CREATE TABLE Socialize(
    animalID        CHAR(6),
    membershipID    CHAR(6),
    evaluation      CHAR(80),
    startDate       DATE,
    PRIMARY KEY(animalID, membershipID),
    FOREIGN KEY (animalID) REFERENCES Animal ON DELETE CASCADE,
    FOREIGN KEY (membershipID) REFERENCES FosterFamily ON DELETE CASCADE,
    FOREIGN KEY (startDate) REFERENCES FosterPeriod ON DELETE CASCADE
);

INSERT INTO Shelter VALUES(15427, '1205 East 7th Avenue, Vancouver, BC, Canada');
INSERT INTO Shelter VALUES(54353, '4700 Kingsway, Burnaby, BC, Canada');
INSERT INTO Shelter VALUES(87633, '10153 King George Blvd, Surrey, BC, Canada');
INSERT INTO Shelter VALUES(61256, '2929 Barnet Highway, Coquitlam, BC, Canada');
INSERT INTO Shelter VALUES(73268, '2002 Park Royal S, West Vancouver, BC, Canada');

INSERT INTO Veterinarian VALUES('20145329', 'Satvir Jatana', '604-123-4567');
INSERT INTO Veterinarian VALUES('20378813', 'Robert Orrick', '778-235-4763');
INSERT INTO Veterinarian VALUES('20912185', 'Riley Syverson', '778-851-1259');
INSERT INTO Veterinarian VALUES('21853295', 'Brian McGowan', '778-989-7342');
INSERT INTO Veterinarian VALUES('21593202', '', '604-293-5678');

INSERT INTO AdopterInfo VALUES ('778-293-7563', 'Li Xuan', '348 West 61st Ave, Burnaby');
INSERT INTO AdopterInfo VALUES ('604-489-9922', 'Jayshree Rana', '5082 Trafalga St, Vancouver');
INSERT INTO AdopterInfo VALUES ('778-495-2837', '', '777 Essex Rd, North Vancouver');
INSERT INTO AdopterInfo VALUES ('778-222-2922', 'Zoe Magnussen', '8035 Ash St, Vancouver');
INSERT INTO AdopterInfo VALUES ('604-928-9119', 'Crystal Zheng', '998 Sussex Rd, Langley');
INSERT INTO AdopterInfo VALUES ('604-123-5692', '', '2929 Winslow Ave, Coquitlam');

INSERT INTO AdopterContact VALUES('24591013', '778-293-7563');
INSERT INTO AdopterContact VALUES('71271183', '604-489-9922');
INSERT INTO AdopterContact VALUES('43921541', '778-495-2837');
INSERT INTO AdopterContact VALUES('27265939', '778-222-2922');
INSERT INTO AdopterContact VALUES('13562782', '604-928-9119');
INSERT INTO AdopterContact VALUES('45193156', '604-123-5692');

INSERT INTO Animal VALUES ('102543', 'Leo', TO_DATE ('21-JUL-2023', 'DD-MM-YYYY'), 'male', 2, 'shelter caring', 15427, '');
INSERT INTO Animal VALUES ('56765', 'Winston', TO_DATE ('06-OCT-2021', 'DD-MM-YYYY'), 'male', 7, 'adopted', 15427, '71271183');
INSERT INTO Animal VALUES ('869', 'Nala', TO_DATE ('30-MAY-2018', 'DD-MM-YYYY'), 'female', 12, 'shelter caring', 15427, '');
INSERT INTO Animal VALUES ('361', 'Milo', TO_DATE ('20-JUL-2015', 'DD-MM-YYYY'), 'male', 9, 'adopted', 15427, '43921541');
INSERT INTO Animal VALUES ('7829', 'Rocky', TO_DATE ('08-AUG-2021', 'DD-MM-YYYY'), 'male', 5, 'adopted', 15427, '27265939');
INSERT INTO Animal VALUES ('83401', 'Lola', TO_DATE ('07-APR-2023', 'DD-MM-YYYY'), 'female',null, 'fostering', 15427, '');
INSERT INTO Animal VALUES ('461', 'Lucy', TO_DATE ('30-APR-2021', 'DD-MM-YYYY'), 'female', 3, 'adopted', 15427, '45193156');
INSERT INTO Animal VALUES ('94825', 'Buddy', TO_DATE ('12-AUG-2022', 'DD-MM-YYYY'), 'male', 2, 'adopted', 15427, '24591013');
INSERT INTO Animal VALUES ('86376', 'Oliver', TO_DATE ('31-JAN-2023', 'DD-MM-YYYY'), 'male', null, 'fostering', 15427, '');
INSERT INTO Animal VALUES ('4396', 'Lily', TO_DATE ('15-MAY-2019', 'DD-MM-YYYY'), 'female', 9, 'shelter caring', 15427, '');

INSERT INTO Cat VALUES('102543', 'maine coon');
INSERT INTO Cat VALUES('361', 'british shorthair');
INSERT INTO Cat VALUES('461', 'ragdoll');
INSERT INTO Cat VALUES('56765', 'munchkin');
INSERT INTO Cat VALUES('7829', 'russin blue');

INSERT INTO Dog VALUES('94825', '');
INSERT INTO Dog VALUES('86376', 'border collie');
INSERT INTO Dog VALUES('83401', '');
INSERT INTO Dog VALUES('4396', 'rottweiler');
INSERT INTO Dog VALUES('869', 'welsh corgi');

INSERT INTO StaffManages VALUES('315899', 'John Doe', 'jd91lfes@gmail.com', 15427, 'Attendant');
INSERT INTO StaffManages VALUES('291942', 'Mia Yang', 'mianyang@hotmail.com', 15427, 'Attendant');
INSERT INTO StaffManages VALUES('341182', 'Rea Wong', 'feeswong11@gmail.com', 15427, '');
INSERT INTO StaffManages VALUES('302561', 'Susan Novak', 'abcdef@er.com', 15427, 'Attendant Manager');
INSERT INTO StaffManages VALUES('291104', 'Sean Sampson', 'ssncq@yahoo.com', 15427, '');
INSERT INTO StaffManages VALUES('152567', 'Rick Johnson', 'swiq0311@gmail.com', 15427, 'Attendant');
INSERT INTO StaffManages VALUES('637780', 'Larry Bird', '1798287822@qq.com', 15427, '');
INSERT INTO StaffManages VALUES('711596', 'Melvin Connor', 'mconnor12@gmail.com', 15427, 'Officer');
INSERT INTO StaffManages VALUES('329104', 'John Kennedy', '200ekennedy@yahoo.com', 15427, '');
INSERT INTO StaffManages VALUES('451994', 'Rodney Wilson', 'ro0831wn@hotmail.com', 15427, '');

INSERT INTO Employee VALUES('302561', '72,000');
INSERT INTO Employee VALUES('152567', '50,000');
INSERT INTO Employee VALUES('711596', '69,000');
INSERT INTO Employee VALUES('329104', '');
INSERT INTO Employee VALUES('451994', '50,000');

INSERT INTO Volunteer VALUES('341182', 72);
INSERT INTO Volunteer VALUES('291104', 760);
INSERT INTO Volunteer VALUES('637780', 485);
INSERT INTO Volunteer VALUES('291942', 1462);
INSERT INTO Volunteer VALUES('315899', 135);

INSERT INTO Food VALUES('6850381140', 'old dog', '', 25);
INSERT INTO Food VALUES('6858925140', 'cat', 'Grain Free 95% Beef And Beef Liver Pate', 365);
INSERT INTO Food VALUES('6812961140', 'young dog', 'Grain Free Duck/Sweet Potato Can', 477);
INSERT INTO Food VALUES('6850381561', 'dog', 'Grain-Free Chicken Stew Dinner', 526);
INSERT INTO Food VALUES('6870281140', 'kitten', 'Tuna Entre Food', 370);
INSERT INTO Food VALUES('6870281234', 'kitten', 'Beef for Kitties', 120);
INSERT INTO Food VALUES('7870281234', 'cat', 'Meowful of Goodness', 50);
INSERT INTO Food VALUES('4870281234', 'old cat', 'Healthy Chicken Bits for Older Cats', 14);

INSERT INTO Supporter VALUES ('18243', 'Jonathan Ruda', '604-452-4321');
INSERT INTO Supporter VALUES ('647201', 'Jane Burrows', '604-887-7743');
INSERT INTO Supporter VALUES ('881', '', '604-678-9876');
INSERT INTO Supporter VALUES ('85732', 'William Anderson', '604-121-1111');
INSERT INTO Supporter VALUES ('758305', 'Ayush Hariadi', '604-321-3651');
INSERT INTO Supporter VALUES ('99320', '', '778-659-8990');
INSERT INTO Supporter VALUES ('127562', 'Manvir Bharat', '778-010-5716');
INSERT INTO Supporter VALUES ('111994', 'Allan Ho', '778-042-1341');
INSERT INTO Supporter VALUES ('281121', 'Elijah McCoy', '604-769-5630');
INSERT INTO Supporter VALUES ('513632', 'Hannah Wood', '604-942-0653');

INSERT INTO Donor VALUES ('18243');
INSERT INTO Donor VALUES ('647201');
INSERT INTO Donor VALUES ('881');
INSERT INTO Donor VALUES ('85732');
INSERT INTO Donor VALUES ('758305');

INSERT INTO FosterFamily VALUES ('99320', '2068 Willingdon Ave, Burnaby');
INSERT INTO FosterFamily VALUES ('127562', '4028 West 41st Ave, Vancouver');
INSERT INTO FosterFamily VALUES ('111994', '8842 Fremlin St, Vancouver');
INSERT INTO FosterFamily VALUES ('281121', '413 Hurst St, Burnaby');
INSERT INTO FosterFamily VALUES ('513632', '9832 Whalley Bvld, Surrey');

INSERT INTO Feed VALUES ('102543', '315899', '', null);
INSERT INTO Feed VALUES ('56765', '291942', '', null);
INSERT INTO Feed VALUES ('361', '341182', TO_DATE ('11-JAN-2023', 'DD-MM-YYYY'), 1000);
INSERT INTO Feed VALUES ('83401', '302561', TO_DATE ('13-DEC-2022', 'DD-MM-YYYY'), 1240);
INSERT INTO Feed VALUES ('869', '291104', TO_DATE ('14-DEC-2019', 'DD-MM-YYYY'), 1330);
INSERT INTO Feed VALUES ('869', '315899', TO_DATE ('22-MAY-2020', 'DD-MM-YYYY'), 1500);
INSERT INTO Feed VALUES ('361', '291104', TO_DATE ('20-JUL-2015', 'DD-MM-YYYY'), 1230);
INSERT INTO Feed VALUES ('7829', '637780', TO_DATE ('19-APR-2022', 'DD-MM-YYYY'), 1130);
INSERT INTO Feed VALUES ('83401', '341182', TO_DATE ('19-APR-2023', 'DD-MM-YYYY'), 1530);
INSERT INTO Feed VALUES ('461', '291942', TO_DATE ('30-JUN-2021', 'DD-MM-YYYY'), 1140);
INSERT INTO Feed VALUES ('94825', '637780', TO_DATE ('11-SEP-2022', 'DD-MM-YYYY'), 1420);
INSERT INTO Feed VALUES ('94825', '315899', TO_DATE ('22-OCT-2022', 'DD-MM-YYYY'), 1610);
INSERT INTO Feed VALUES ('86376', '637780', TO_DATE ('19-FEB-2023', 'DD-MM-YYYY'), 1830);
INSERT INTO Feed VALUES ('86376', '315899', TO_DATE ('09-MAR-2023', 'DD-MM-YYYY'), 1040);
INSERT INTO Feed VALUES ('86376', '291942', TO_DATE ('01-MAY-2023', 'DD-MM-YYYY'), 1450);
INSERT INTO Feed VALUES ('86376', '341182', TO_DATE ('02-MAY-2023', 'DD-MM-YYYY'), 1250);
INSERT INTO Feed VALUES ('86376', '291104', TO_DATE ('05-MAY-2023', 'DD-MM-YYYY'), 1550);
INSERT INTO Feed VALUES ('4396', '341182', TO_DATE ('19-NOV-2020', 'DD-MM-YYYY'), 1110);
INSERT INTO Feed VALUES ('4396', '291942', TO_DATE ('25-DEC-2020', 'DD-MM-YYYY'), 1450);
INSERT INTO Feed VALUES ('361', '315899', TO_DATE ('20-JUL-2016', 'DD-MM-YYYY'), 1230);
INSERT INTO Feed VALUES ('361', '291942', TO_DATE ('20-OCT-2017', 'DD-MM-YYYY'), 1330);
INSERT INTO Feed VALUES ('361', '637780', TO_DATE ('20-AUG-2018', 'DD-MM-YYYY'), 1430);

INSERT INTO Stock VALUES ('315899', '6850381140');
INSERT INTO Stock VALUES ('291942', '6858925140');
INSERT INTO Stock VALUES ('341182', '6812961140');
INSERT INTO Stock VALUES ('302561', '6850381561');
INSERT INTO Stock VALUES ('291104', '6870281140');

INSERT INTO CheckUp VALUES ('20145329', '102543', '', 'healthy');
INSERT INTO CheckUp VALUES ('20378813', '461', '', '');
INSERT INTO CheckUp VALUES ('20912185', '461', TO_DATE ('12-APR-2023', 'DD-MM-YYYY'), '');
INSERT INTO CheckUp VALUES ('20378813', '56765', TO_DATE ('20-DEC-2022', 'DD-MM-YYYY'), 'not healthy');
INSERT INTO CheckUp VALUES ('21593202', '869', TO_DATE ('30-JUN-2018', 'DD-MM-YYYY'), 'healthy');

INSERT INTO Give VALUES ('18243', '6850381140', '', 30);
INSERT INTO Give VALUES ('647201', '6858925140', TO_DATE ('20-JAN-2021', 'DD-MM-YYYY'), 18);
INSERT INTO Give VALUES ('881', '6812961140', TO_DATE ('01-SEP-2022', 'DD-MM-YYYY'), 39);
INSERT INTO Give VALUES ('85732', '6850381561', TO_DATE ('25-APR-2022', 'DD-MM-YYYY'), 52);
INSERT INTO Give VALUES ('758305', '6870281140', TO_DATE ('28-FEB-2023', 'DD-MM-YYYY'), 11);

INSERT INTO FosterPeriod VALUES (TO_DATE ('22-JUL-2023', 'DD-MM-YYYY'), '');
INSERT INTO FosterPeriod VALUES (TO_DATE ('10-MAR-2023', 'DD-MM-YYYY'), '');
INSERT INTO FosterPeriod VALUES (TO_DATE ('11-AUG-2022', 'DD-MM-YYYY'), TO_DATE ('11-DEC-2022', 'DD-MM-YYYY'));
INSERT INTO FosterPeriod VALUES (TO_DATE ('30-MAY-2018', 'DD-MM-YYYY'), TO_DATE ('30-SEP-2018', 'DD-MM-YYYY'));
INSERT INTO FosterPeriod VALUES (TO_DATE ('31-JUL-2015', 'DD-MM-YYYY'), TO_DATE ('01-DEC-2015', 'DD-MM-YYYY'));
INSERT INTO FosterPeriod VALUES (TO_DATE ('15-AUG-2021', 'DD-MM-YYYY'), TO_DATE ('15-DEC-2021', 'DD-MM-YYYY'));

INSERT INTO Socialize VALUES ('94825', '99320', 'friendly', TO_DATE ('22-JUL-2023', 'DD-MM-YYYY'));
INSERT INTO Socialize VALUES ('461', '111994', 'friendly', TO_DATE ('10-Mar-2023', 'DD-MM-YYYY'));
INSERT INTO Socialize VALUES ('56765', '281121', 'not friendly', TO_DATE ('11-AUG-2022', 'DD-MM-YYYY'));
INSERT INTO Socialize VALUES ('869', '513632', '', TO_DATE ('30-MAY-2018', 'DD-MM-YYYY'));
INSERT INTO Socialize VALUES ('361', '99320', 'friendly', TO_DATE ('31-JUL-2015', 'DD-MM-YYYY'));
INSERT INTO Socialize VALUES ('7829', '127562', 'friendly', TO_DATE ('15-AUG-2021', 'DD-MM-YYYY'));
