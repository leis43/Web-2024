<?php
require_once 'database.php';
require_once 'httpUtils.php';
authByCookie();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление поста</title>
    <script src="./js/admin.js" defer></script>
    <link rel="stylesheet" href="./static/styles/home.css"/>
    <link rel="stylesheet" href="./static/styles/admin.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&family=Lora&family=Roboto&display=swap"
          rel="stylesheet"/>
</head>
<body class="page">
<header class="site-header">
    <div class="site-header__logo">
        <span class="site-header__escape">Escape.</span>
        <span class="site-header__author">author</span>
    </div>
    <div class="site-header__menu">
        <div class="site-header__icon" id="userIcon">
            <p id="userInitials" class="site-header__userInitials"></p>
        </div>
            <img id="logOutButton" class="site-header__log-out" src="./static/images/images_admin/MenuItem.png" alt="Escape.author"/>
    </div>
</header>
<form class="main-block" method="post" enctype="multipart/form-data">
    <div class="main-block__top-block">
        <div class="main-block__top-text">
            <h1 class="main-block__title">New Post</h1>
            <h2 class="main-block__subtitle">Fill out the form bellow and publish your article</h2>
        </div>
        <button type="submit" class="main-block__publish">Publish</button>
    </div>
    <div id="alertMessage" class="main-block__message">
        <img src="./static/images/images_admin/alert-circle.svg"/>
        <span class="main-block__message-text">Whoops! Some fields need your attention :o</span>
    </div>
    <div id="successMessage" class="main-block__message main-block__message_success">
        <img src="./static/images/images_admin/check-circle.svg"/>
        <span class="main-block__message-text">Publish Complete!</span>
    </div>
    <div class="main-block__main-info main-info">
        <h2 class="main-info__title">Main information</h2>
        <div class="main-info__form form">
            <div class="form__form-row form-row">
                <span class="form-row__title">Title</span>
                <input type="text" name="title" value="New Post" class="form-row__input form-row__input_filled"
                       id="inputTitle"/>
            </div>
            <div class="form__form-row form-row">
                <span class="form-row__title">Short description</span>
                <input id="inputSub" type="text" name="subtitle" value="Please, enter any description"
                       class="form-row__input form-row__input_filled"/>
            </div>
            <div class="form__form-row form-row">
                <span class="form-row__title">Author name</span>
                <input id="inputAuthorName" type="text" name="authorName" class="form-row__input"/>
            </div>
            <div class="form__form-row form-row">
                <span class="form-row__title">Author Photo</span>
                <div id="avatarController" class="form-row__upload-buttons">
                    <div class="form-row__avatar-placeholder"></div>
                    <label for="inputAuthorImage" class="form-row__upload-button">
                        <img id="avatarCamera" src="./static/images/images_admin/camera.png" class="hidden"/>
                        <span id="uploadAvatarText" class="form-row__upload-button-text">Upload</span>
                    </label>
                    <div id="removeAvatarButton" class="form-row__upload-button hidden">
                        <img src="./static/images/images_admin/trash.png"/>
                        <span class="form-row__upload-button-text form-row__upload-button-text_remove">Remove</span>
                    </div>
                </div>
                <input id="inputAuthorImage" class="form-row__image-input" accept="image/png,image/jpeg,image/gif"
                       type="file" name="authorAvatar"/>
            </div>
            <div class="form__form-row form-row">
                <span class="form-row__title">Publish Date</span>
                <input id="inputDate" type="date" name="publishDate" class="form-row__input"/>
            </div>
            <div id="mainImageBlock" class="form__form-row form-row">
                <span class="form-row__title">Hero Image</span>
                <label for="inputMainImage" class="form-row__upload">
                    <div class="upload__main-image"></div>
                </label>
                <div id="mainImageController" class="form-row__upload-buttons form-row__upload-buttons_preview hidden">
                    <label for="inputMainImage" class="form-row__upload-button">
                        <img src="./static/images/images_admin/camera.png"/>
                        <span class="form-row__upload-button-text">Upload New</span>
                    </label>
                    <div id="removeMainImageButton" class="form-row__upload-button">
                        <img src="./static/images/images_admin/trash.png"/>
                        <span class="form-row__upload-button-text form-row__upload-button-text_remove">Remove</span>
                    </div>
                </div>
                <input id='inputMainImage' class="form-row__image-input" type="file"
                       accept="image/png,image/jpeg,image/gif" name="mainImage"/>
                <span id="mainImageRemark" class="form-row__remark">Size up to 10mb. Format: png, jpeg, gif.</span>
            </div>
            <div id="previewImageBlock" class="form__form-row form-row">
                <span class="form-row__title">Hero Image</span>
                <label for="inputPreviewImage" class="form-row__upload form-row__upload_small">
                    <div class="upload__preview-image"></div>
                </label>
                <div id="previewImageController"
                     class="form-row__upload-buttons form-row__upload-buttons_preview hidden">
                    <label for="inputPreviewImage" class="form-row__upload-button">
                        <img src="./static/images/images_admin/camera.png"/>
                        <span class="form-row__upload-button-text">Upload New</span>
                    </label>
                    <div id="removePreviewImageButton" class="form-row__upload-button">
                        <img src="./static/images/images_admin/trash.png"/>
                        <span class="form-row__upload-button-text form-row__upload-button-text_remove">Remove</span>
                    </div>
                </div>
                <input id="inputPreviewImage" class="form-row__image-input" type="file" name="previewImage"
                       accept="image/png,image/jpeg,image/gif"/>
                <span id="previewImageRemark" class="form-row__remark">Size up to 5mb. Format: png, jpeg, gif.</span>
            </div>
        </div>
        <div class="main-info__preview preview">
            <p class="preview__title">Article preview</p>
            <div class="preview__article-preview article-preview">
                <div class="article-preview__block">
                    <div class="article-preview__top">
                        <div class="article-preview__ellipse"></div>
                        <div class="article-preview__ellipse"></div>
                        <div class="article-preview__ellipse"></div>
                    </div>
                    <p class="article-preview__title">New Post</p>
                    <p class="article-preview__subtitle">Please, enter any description</p>
                    <div class="article-preview__image"></div>
                </div>
                <div class="article-preview__right-blur"></div>
                <div class="article-preview__bottom-blur"></div>
            </div>
            <p class="preview__title">Post card preview</p>
            <div class="preview__card-preview card-preview">
                <div class="card-preview__block">
                    <div class="card-preview__image"></div>
                    <div class="card-preview__info">
                        <p class="card-preview__title">New Post</p>
                        <p class="card-preview__subtitle">Please, enter any description</p>
                    </div>
                    <div class="card-preview__bottom-block">
                        <div class="card-preview__author">
                            <div class="card-preview__author-image"></div>
                            <span class="card-preview__author-name">Enter author name</span>
                        </div>
                        <span class="card-preview__date">4/19/2023</span>
                    </div>
                    <div class="card-preview__right-blur"></div>
                    <div class="card-preview__bottom-blur"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-block__content content">
        <h2 class="content__title">Content</h2>
        <div class="content__form-row form-row">
            <span class="form-row__title">Post content (plain text)</span>
            <textarea class="form-row__text-area" name="content" placeholder="Type anything you want ..."></textarea>
        </div>
    </div>
</form>
</body>
</html>
