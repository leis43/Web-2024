<?php
require_once 'httpUtils.php';
if (isset($_COOKIE['auth'])) {
    unset($_COOKIE['auth']);
    setcookie('auth', '', -1, '/');
    sendStatusCode200();
} else {
    sendStatusCode401();
}