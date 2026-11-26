
<?php
require_once "auth.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usernameInput = $_POST['username'] ?? '';
    $passwordInput = $_POST['password'] ?? '';

    login($usernameInput, $passwordInput);

} else {

    header("Location: login.php");
    exit;
}
?>
