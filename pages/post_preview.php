<div class="user-actions__post">
   <img class="user-actions-post__background" src="<?= $post['img_modifier'] ?>" alt="img">
   <div class="user-actions-post__description">
      <a href="#" class="user-actions-post__title">
         <?= $post['title'] ?>
      </a>
      <span class="user-actions-post__subtitle">
         <?= $post['subtitle'] ?>
      </span>
   </div>
   <div class="user-actions-post__info">
      <div class="user-actions-post-info__autor">
         <img class="user-actions-post-autor__avatar" src="<?= $post['img_autor'] ?>" alt="img">
         <span class="user-actions-post-autor__name">
            <?= $post['author'] ?>
         </span>
      </div>
      <span class="user-actions-post-info__publish-data">
         <?= $post['posting_data'] ?>
      </span>
   </div>
</div>