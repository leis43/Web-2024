<a class="news__post" href='/post?id=<?= $post['id'] ?>' style="background-image: url('<?= $post["image_url"] ?>');
        background-size: cover; ">
    <div class="news-post__description">
        <h3 class="news-post__title">
            <?= $post['title'] ?>
        </h3>
        <span class="news-post__subtitle">
			<?= $post['subtitle'] ?>
		</span>
        <div class="news-post__info">
            <div class="news-post-info__autor">
                <img class="news-post-info-autor__avatar" src="<?= $post['author_url'] ?>" alt="img">
                <span class="news-post-info-autor__name">
					<?= $post['author'] ?>
				</span>
            </div>
            <span class="news-post-info__release-date">
				<?= $post['publish_date'] ?>
			</span>
        </div>
    </div>
</a>