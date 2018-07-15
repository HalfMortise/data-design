-- noinspection SqlNoDataSourceInspectionForFile

-- The statement below sets the collation of the database to utf8
ALTER DATABASE your_database_name_CHANGE_ME CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- this is a comment in SQL (yes, the space is needed!)
-- the following statements will drop the tables and re-add them
-- this is akin to reformatting and reinstalling Windows (OS X never needs a reinstall...) ;)
-- never ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever
-- do this on live data!!!!
DROP TABLE IF EXISTS `like`;
DROP TABLE IF EXISTS tweet;
DROP TABLE IF EXISTS profile;

-- the CREATE TABLE function is a function that takes tons of arguments to layout the table's schema
CREATE TABLE profile (
	-- this creates the attribute for the primary key
	-- not null means the attribute is required!
	accountId BINARY(16) NOT NULL,
	accountActivationToken CHAR(32),
	accountName VARCHAR(32) NOT NULL,
	accountEmail VARCHAR(128) NOT NULL,
	-- to make something optional, exclude the not null
	accountHash CHAR(97) NOT NULL,
	-- to make sure duplicate data cannot exist, create a unique index
	UNIQUE(accountName),
	UNIQUE(accountEmail),
	-- this officiates the primary key for the entity
	PRIMARY KEY(accountId)
);

-- create the profile entity
CREATE TABLE profile (
	-- this is for another primary key
	profileId BINARY(16) NOT NULL,
	profileName VARCHAR(32) NOT NULL,
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

-- create the like entity (a weak entity from an m-to-n for profile --> tweet)
CREATE TABLE contentProfile (
	-- these are still foreign keys
	contentProfileProfileId BINARY(16) NOT NULL,
	contentProfileContentId BINARY(16) NOT NULL,
	contentProfileTrackPosition CHAR(8),
	-- index the foreign keys
	INDEX(contentProfileProfileId),
	INDEX(contentProfileContentId),
	-- create the foreign key relations
	FOREIGN KEY(contentProfileProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(contentProfileContentId) REFERENCES profile(profileId),
	-- finally, create a composite foreign key with the two foreign keys
);