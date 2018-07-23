
INSERT INTO account(accountId, accountProfileId, accountActivationToken, accountName, accountEmail, accountHash) VALUES(UNHEX("da513e71027c4234a4456fe8a3859720"), "ecorsi", "ecorsi@cnm.edu", "9ff83701be512b7c9d4da548eed3a97e");

UDPATE account SET accountActivationToken = "4312514f4a5e702e0af94f1566324098" WHERE accountId = UNHEX("da513e71027c4234a4456fe8a3859720");

DELETE FROM account WHERE accountId = UNHEX("da513e71027c4234a4456fe8a3859720");

SELECT accountEmail, accountHash, accountName, accountProfile FROM account WHERE accountEmail="ecorsi@cnm.edu";