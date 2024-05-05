<div href='/post?id=<?= $post['id'] ?>'>
  <div class="title">
		<h1>
			<?= $post['title'] ?>
		</h1>
		<p>
			<?= $post['subtitle'] ?>
		</p>
	</div>
	<img src="<?= $post['image_url'] ?>" alt="img" class="P1" /> 
	<div class="text">
    <?= $post['content'] ?>
	</div>
</div>    