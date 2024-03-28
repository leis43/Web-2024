<a class="news__post" href='/post?id=<?= $post['id'] ?>' style="background-image: url('<?= $post["img_modifier"] ?>');
        background-size: cover; ">
  <?php if ($post['id'] != 1): ?>
    <span class="news-post__button">
      <?= $post['button'] ?>
    </span>
  <?php endif; ?>
  <div class="news-post__description">
    <h3 class="news-post__title">
      <?= $post['title'] ?>
    </h3>
    <span class="news-post__subtitle">
      <?= $post['subtitle'] ?>
    </span>
    <div class="news-post__info">
      <div class="news-post-info__autor">
        <img class="news-post-info-autor__avatar" src="<?= $post['img_autor'] ?>" alt="img">
        <span class="news-post-info-autor__name">
          <?= $post['author'] ?>
        </span>
      </div>
      <span class="news-post-info__release-date">
        <?= $post['posting_data'] ?>
      </span>
    </div>
  </div>
</a>