<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <script src="./js/login.js" defer></script>
    <link rel="stylesheet" href="./static/styles/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&family=Lora&family=Roboto&display=swap" rel="stylesheet" />
</head>
<body class="page">
<div class="container">
    <div class="message">
        <div class="message__title">
            <span class="message__escape">Escape.</span>
            <span class="message__author">author</span>
        </div>
        <span class="message__subtitle">Log in to start creating</span>
    </div>
    <form class="form">
        <h1 id="formTitle" class="form__title">Log In</h1>
        <div id="mainError" class="form__error">
            <img src="./static/images/images_admin/alert-circle.svg" alt="alert" />
            <span id="mainErrorText" class="form__error-text">Email or password is incorrect.</span>
        </div>
        <div class="form__form-row form-row">
            <p class="form-row__title">Email</p>
            <input id="inputEmail" type="text" name="email" class="form-row__input" />
            <span id="emailError" class="form-row__error hidden">Email is required.</span>
        </div>
        <div class="form__form-row form-row">
            <p class="form-row__title">Password</p>
            <div class="form-row__input-password">
                <input id="inputPassword" type="password" name="password" class="form-row__input" />
                <img id="passwordEye" src="./static/images/images_login/eye-off.png" class="form-row__input-eye"/>
            </div>
            <span id="passwordError" class="form-row__error hidden">Password is required.</span>
        </div>
        <button type="submit" class="form__login">Log In</button>
    </form>
</div>
</body>
</html>
