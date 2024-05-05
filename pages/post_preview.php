<a href='/post?id=<?= $post['id'] ?>' class="user-actions__post">
	<img class="user-actions-post__background" src="<?= $post['image_url'] ?>" alt="img">
	<div class="user-actions-post__description">
		<h2 class="user-actions-post__title">
			<?= $post['title'] ?>
		</h2>
		<h3 class="user-actions-post__subtitle">
			<?= $post['subtitle'] ?>
		</h3>
	</div>
	<div class="user-actions-post__info">
		<div class="user-actions-post-info__autor">
			<img class="user-actions-post-autor__avatar" src="<?= $post['author_url'] ?>" alt="img">
			<p class="user-actions-post-autor__name">
				<?= $post['author'] ?>
			</p>
		</div>
		<p class="user-actions-post-info__publish-data">
			<?= date('n/d/Y', strtotime($post['publish_date'])) ?>
		</p>
	</div>
</a>