
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

INSERT INTO chat VALUES (100,"Juan","Miguel","Hello",CURRENT_DATE());
INSERT INTO chat VALUES (100,"Ramon","Antonio","Hi",CURRENT_DATE());

DELETE FROM chat WHERE Sender="hello";
DELETE FROM users;

SELECT * FROM users;
SELECT * FROM apartmentinformation;
SELECT * FROM Apartment;
SELECT * FROM chat;
SELECT CURRENT_DATE();

ALTER TABLE chat DROP PRIMARY KEY;
ALTER TABLE chat DROP COLUMN ChatID;
ALTER TABLE chat MODIFY sessionId INT NOT NULL PRIMARY KEY ;
ALTER TABLE chat ADD COLUMN sessionId INT (255) AFTER ChatID ;