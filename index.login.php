
<?php
include "auth.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h1>Selamat Datang!</h1>

    <p>
         <?php echo htmlspecialchars($_SESSION['username']); ?>.
    </p>

    <a href="logout.php" class="logout">
        Logout
    </a>
</div>

</body>
</html>
