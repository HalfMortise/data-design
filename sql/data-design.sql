ALTER DATABASE ecorsi CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- never do this on live data!!!!
DROP TABLE IF EXISTS contentprofile;
DROP TABLE IF EXISTS content;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS account;

-- the CREATE TABLE function is a function that takes tons of arguments to layout the table's schema
CREATE TABLE account (
	-- this creates the attribute for the primary key
	-- not null means the attribute is required!
	accountId BINARY(16) NOT NULL,
	accountProfileId BINARY (16) NOT NULL,
	accountActivationToken CHAR(32),
	accountName VARCHAR(32) NOT NULL,
	accountEmail VARCHAR(128) NOT NULL,
	-- to make something optional, exclude the not null
	accountHash CHAR(97) NOT NULL,
	-- to make sure duplicate data cannot exist, create a unique index
	UNIQUE(accountName),
	UNIQUE(accountEmail),
	PRIMARY KEY(accountId)
);

-- create the profile entity
CREATE TABLE profile (
	-- this is for another primary key
	profileId BINARY(16) NOT NULL,
	accountProfileId BINARY(16) NOT NULL,
	profileName VARCHAR(32) NOT NULL,
	INDEX(accountProfileId),
	FOREIGN KEY (accountProfileId) REFERENCES account(accountId),
	PRIMARY KEY(profileId)
);

-- create the content entity
CREATE TABLE content (
	-- this is for yet another primary key...
	contentId BINARY(16) NOT NULL,
	-- this is for a foreign key
	contentEpisode VARCHAR(128) NOT NULL,
	contentGenre VARCHAR(132) NOT NULL,
	PRIMARY KEY(contentId)
);

-- create the contentprofile entity (the weak entity)
CREATE TABLE contentprofile (
	-- these are still foreign keys
	contentProfileProfileId BINARY(16) NOT NULL,
	contentProfileContentId BINARY(16) NOT NULL,
	contentProfileTrackPosition CHAR(8),
	-- index the foreign keys
	INDEX(contentProfileProfileId),
	INDEX(contentProfileContentId),
	-- create the foreign key relations
	FOREIGN KEY(contentProfileProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(contentProfileContentId) REFERENCES content(contentId)
);