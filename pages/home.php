<?php
require_once 'database.php';

function getFuturedPostsFromDB(mysqli $conn): array
{
	$sql = "SELECT * FROM post WHERE featured = 1";
	$result = $conn->query($sql);
	$output = [];
	if ($result->num_rows > 0) {
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			$output[$i] = $row;
			$i++;
		}
	}
	return $output;
}

function getMostPostsFromDB(mysqli $conn): array
{
	$sql = "SELECT * FROM post WHERE featured = 0";
	$result = $conn->query($sql);
	$output = [];
	if ($result->num_rows > 0) {
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			$output[$i] = $row;
			$i++;
		}
	}
	return $output;
}

	$conn = createDBConnection();
	$futered_posts = getFuturedPostsFromDB($conn);
    $most_posts = getMostPostsFromDB($conn);
	closeDBConnection($conn);

?>
<!doctype html>
<html lang="en">

<head>
	<title>Let\'s do it together.</title>
	<link type="text/css" rel="stylesheet" href="./static/styles/home.css">
	<link
		href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
		rel="stylesheet">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>

<body>
	<header class="header">
		<div class="navigation">
			<a class="navigation__logo" href="#">
				<img src="./static/images/images__home/Escape1.svg">
			</a>
			<ul class="navigation__list">
				<li>
					<a class="navigation__link" href="#">HOME</a>
				</li>
				<li>
					<a class="navigation__link" href="#">CATEGORIES</a>
				</li>
				<li>
					<a class="navigation__link" href="#">ABOUT</a>
				</li>
				<li>
					<a class="navigation__link" href="#">CONTACT</a>
				</li>
			</ul>
		</div>
		<div class="header__baner">
			<h1 class="header__title">Let's do it together.</h1>
			<span class="header__subtitle">We travel the world in search of stories. Come along for the ride.</span>
			<a href="#" class="header__button">View Latest Posts </a>
		</div>
	</header>
	<ul class="menu">
		<li>
			<a href="#" class="menu__link">Nature</a>
		</li>
		<li>
			<a href="#" class="menu__link">Photography</a>
		</li>
		<li>
			<a href="#" class="menu__link">Relaxation</a>
		</li>
		<li>
			<a href="#" class="menu__link">Vacation</a>
		</li>
		<li>
			<a href="#" class="menu__link">Travel</a>
		</li>
		<li>
			<a href="#" class="menu__link">Adventure</a>
		</li>
	</ul>
	<main class="content">
		<div class="section-headings">
			<span class="section-headings__title">Featured Posts</span>
		</div>
		<div class="news">
			<?php

			foreach ($futered_posts as $post) {
				include 'futered_post.php';
			}
			?>
		</div>
		<div class="section-headings">
			<span class="section-headings__title">Most Recent</span>
		</div>
		<div class="user-actions">
			<div class="user-action-posts">
				<?php
				foreach ($most_posts as $post) {
					include 'post_preview.php';
				}
				?>
			</div>
		</div>
	</main>
	<footer class="footer">
		<div class="navigation">
			<a class="navigation__logo_foot" href="#">
				<img src="./static/images/images__home/Escape2.svg">
			</a>
			<ul class="navigation__list navigation__list_foot">
				<li>
					<a class="navigation__link" href="#">HOME</a>
				</li>
				<li>
					<a class="navigation__link" href="#">CATEGORIES</a>
				</li>
				<li>
					<a class="navigation__link" href="#">ABOUT</a>
				</li>
				<li>
					<a class="navigation__link" href="#">CONTACT</a>
				</li>
			</ul>
		</div>
	</footer>
</body>

</html>