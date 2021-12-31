
INSERT INTO Users 
VALUES(100,"jovelluna","Jovel Luna","password",
"jovelluna@ymail.com","Tenant","Verified","Male",094568791256,"Cagayan De Oro");


INSERT INTO Users 
VALUES(101,"christeranul","Christer Acedo","password",
"chrislun@ymail.com","Owner","Verified","Male",0945627612456,"Cagayan De Oro");


INSERT INTO Apartment 
VALUES(1,"Melchora Apartments",101);

INSERT INTO apartmentinformation 
VALUES(1,50,500.00,60,"Cagayan de Oro","School, Public Market","No Services","None Uploaded");

SELECT * FROM Users;
SELECT * FROM apartmentinformation;
SELECT * FROM Apartment;

ALTER TABLE chat DROP PRIMARY KEY;
ALTER TABLE chat DROP COLUMN sessionId;
ALTER TABLE chat MODIFY sessionId INT NOT NULL PRIMARY KEY ;
ALTER TABLE chat ADD COLUMN sessionId INT (255) AFTER ChatID ;