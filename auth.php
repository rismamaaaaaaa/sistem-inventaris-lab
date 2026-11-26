
<?php
session_start();

function login($usernameInput, $passwordInput) {

    $username = "admin";
    $password = "12345";

    if ($usernameInput === $username && $passwordInput === $password) {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    } else {

        header("Location: login.php?error=1");
        exit;
    }
}

function cek_login() {

    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {

        header("Location: /crud_inventaris/login.php");
        exit;
    }
}

function logout() {

    session_unset();
    session_destroy();

    header("Location: /crud_inventaris/login.php");
    exit;
}
?>
