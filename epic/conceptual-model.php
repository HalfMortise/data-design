<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Conceptual Model</title>
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
		<h3>Entities & Attributes</h3>
		<div>
			<ul>Account
				<li>accountId (Primary Key)</li>
				<li>accountName</li>
				<li>accountEmail</li>
				<li>accountPassword</li>
			</ul>
			<ul>Profile
				<li>profileId (Primary Key)</li>
				<li>profileName (Foreign Key)</li>
				<li>profileAvatar</li>
			</ul>
			<ul>Content
				<li>contentId (Primary Key)</li>
				<li>contentGenre</li>
				<li>contentName</li>
				<li>contentSeason</li>
				<li>contentEpisode</li>
				<li>contentRating (Foreign Key)</li>
				<li>contentFavorite (Foreign Key)</li>
			</ul>
		</div>
		<div>
			<ul>Relationships
				<li>One account can contain multiple profiles (1-to-n)</li>
				<li>Many profiles can rate any/all content (m-to-n)</li>
				<li>Many profiles can favorite any/all content (m-to-n)</li>
			</ul>
		</div>
		<div class="fixed-footer">
			<div class="container"><a href="./index.php">Home</a></div>
		</div>
	</body>
</html>