
<?php
$most_posts = [
	[
		'id' => 3,
		'title' => 'Still Standing Tall',
		'subtitle' => 'Life begins at the end of your comfort zone.',
		'img_modifier' => './static/images/images__home/SST.jpg',
		'author' => 'William Wong',
		'img_autor' => './static/images/images__home/ManWW.png',
		'posting_data' => '9/25/2015',

	],
	[
		'id' => 4,
		'title' => 'Sunny Side Up',
		'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
		'img_modifier' => './static/images/images__home/SSU.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManMV.png',
		'posting_data' => '9/25/2015',
	],
	[
		'id' => 5,
		'title' => 'Water Falls',
		'subtitle' => 'We travel not to escape life, but for life not to escape us',
		'img_modifier' => './static/images/images__home/WF.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManMV.png',
		'posting_data' => '9/25/2015',
	],
	[
		'id' => 6,
		'title' => 'Through the Mist',
		'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
		'img_modifier' => './static/images/images__home/TTM.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManWW.png',
		'posting_data' => '9/25/2015',
	],
	[
		'id' => 7,
		'title' => 'Awaken Early',
		'subtitle' => 'Not all those who wander are lost.',
		'img_modifier' => './static/images/images__home/AE.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManMV.png',
		'posting_data' => '9/25/2015',
	],
	[
		'id' => 8,
		'title' => 'Try it Always',
		'subtitle' => 'The world is a book, and those who do not travel read only one page.',
		'img_modifier' => './static/images/images__home/TIA.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManMV.png',
		'posting_data' => '9/25/2015',
	],
];

$futered_posts = [
	[
		'id' => 1,
		'title' => 'The Road Ahead',
		'subtitle' => 'The road ahead might be paved - it might not be.',
		'img_modifier' => './static/images/images__home/TRA.png',
		'author' => 'Mat Vogels',
		'img_autor' => './static/images/images__home/ManMV.png',
		'posting_data' => 'September 25, 2015',
	],

	[
		'id' => 2,
		'button' => 'ADVENTURE',
		'title' => 'From Top Down',
		'subtitle' => 'Once a year, go someplace you’ve never been before.',
		'img_modifier' => './static/images/images__home/FTD.png',
		'author' => 'William Wong',
		'img_autor' => './static/images/images__home/ManWW.png',
		'posting_data' => 'September 25, 2015',
	],
];
?>
<!doctype html>
<html lang="en">

<head>
	<title>Let\'s do it together.</title>
	<link type="text/css" rel="stylesheet" href="./static/styles/style2-1.css">
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