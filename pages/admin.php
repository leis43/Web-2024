<!doctype html>
<html lang="en">

<head>
	<title>
        <!doctype html>
<html lang="en">

<head>
	<title>admin page</title>
	<link type="text/css" rel="stylesheet" href="./static/styles/admin.css">
	<link
		href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
		rel="stylesheet">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<link type="text/css" rel="stylesheet" href="./static/styles/style3.css">
	<link
		href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
  <header class="header">
    <img class="header__logo" src="./static/images/images_admin/Logo.svg" alt="">
	<ul class="header__thumbnails">
		<li>
      <a href="">
        <img class="header__avatar" src="./static/images/images_admin/Avatar.png" alt="">
      </a>
    </li> 
    <li> 
      <a href="">
        <img class="header__menu" src="./static/images/images_admin/MenuItem.png" alt="">
      </a>
    </li>
  </ul>    
  </header>
  <main class="main">
            <div class="publish-post">
                <div class="publish-post__name">
                    <h1 class="publish-post__title">New Post</h1>
                    <span class="publish-post__subtitle">Fill out the form bellow and publish your article</span>
                </div>
                <a class="publish-post__button" href="">Publish</a>
            </div>
            <div class="post-info">
                <h2 class="post-info__title">Main Information</h2>
                <div class="post-info_form">
                    <form class="post-info__preview">
                        <div class="post-info__main">
                            <div class="post-info-main__block">
                                <span class="item__title">Title</span>
                                <input placeholder="New Post" class="post__input-box" />
                            </div>
                            <div class="post-info-main__block">
                                <span class="item__title">Short description</span>
                                <input placeholder="Please, enter any description" class="post__input-box" />
                            </div>
                            <div class="post-info-main__block">
                                <span class="item__title">Author name</span>
                                <input placeholder="" class="author__input-box">
                            </div>
                            <div class="post-info-main__block">
                                <span class="item__title">Author Photo</span>
                                <input type="file" id="photoAuthor" name="photoAuthor" accept=".jpg, .jpeg, .png" class='input-photo' />
                                <label for="photoAuthor" class="author-photo__input-box">
                                    <div class='input-box__avatar'>
                                        <img src="./static/images/images_admin/camera.png" alt="">
                                    </div>
                                    <span class="input-box_text">Upload</span>
                                </label>
                            </div>
                            <div class="post-info-main__block">
                                <span class="item__title">Publish Date</span>
                                <input class='publish-date__input-box' id="date" type="date" required pattern="\d{4}-\d{2}-\d{2}"/>
                            </div>
                            <div class="post-info-main__block">
                                <span class="item__title">Hero Image</span>
                                <input type="file" id="photoHero1" name="photoAuthor" accept=".jpg, .jpeg, .png" class='input-photo' />
                                <label for='photoHero1' class="hero1__input-box">
                                    <img class="input-box__camera" src="./static/images/images_admin/camera.png" alt="">
                                    <span class="input-box_text">Upload</span>
                                </label>
                                <span class="item__param">Size up to 10mb. Format: png, jpeg, gif.</span>
                            </div>
                            <div class="post-info-main__hero">
                                <span class="item__title">Hero Image</span>
                                <input type="file" id="photoHero2" name="photoAuthor" accept=".jpg, .jpeg, .png" class='input-photo' />
                                <label for='photoHero2' class="hero2__input-box">
                                    <img class="input-box__camera" src="./static/images/images_admin/camera.png" alt="">
                                    <span class="input-box_text">Upload</span>
                                </label>
                                <span class="item__param">Size up to 10mb. Format: png, jpeg, gif.</span>
                            </div>
                        </div>
                        <div class='preview'>
                            <div class='preview__card'>
                                <span class="item__title">Article preview</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      <form>

      </form>

  </main>
</body>
</html>