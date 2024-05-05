<?php
require_once 'database.php';

function getPostContent(mysqli $conn, $idToFind, &$post): void
{
    $sql = "SELECT * FROM post WHERE id = $idToFind";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $post = $row;
        }
    } else {
        $post = null;
        echo "Post with id {$idToFind} has not been found!";
    }
}

        $post = [];
        $postId = (int)$_GET['id'];
        $conn = createDBConnection();
        getPostContent($conn, $postId, $post);
        closeDBConnection($conn);
?>

<!doctype html>
<html lang="en">

<head>
	<title>Post</title>
	<link href="./static/styles/post.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
		rel="stylesheet">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>

<body>
	<header class="top-block">
		<a>
			<img src="./static/images/images__post/Escape..svg" alt="triangle with all three sides equal" class="logo" />
		</a>
		<nav class="links">
			<a class="links-item" href="home">HOME</a>
			<a class="links-item" href="">CATEGORIES</a>
			<a class="links-item" href="">ABOUT</a>
			<a class="links-item" href="">CONTACT</a>
		</nav>
	</header>
    <?php
        if ($post != null) {
            include 'post_template.php';
        }
    ?>
	<footer class="basement-foot">
		<div class="basement-foot-elements">
			<a>
				<img src="./static/images/images__post/Escape2..svg" alt="triangle with all three sides equal"
					class="basement-foot__logo" />
			</a>
			<div class="footer-menu">
				<a class="footer-menu-link" href="">HOME</a>
				<a class="footer-menu-link" href="">CATEGORIES</a>
				<a class="footer-menu-link" href="">ABOUT</a>
				<a class="footer-menu-link" href="">CONTACT</a>
			</div>
		</div>
	</footer>
</body>

</html>