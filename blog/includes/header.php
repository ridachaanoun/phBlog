<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="blog/css/Home.css">
</head>
<body>
<header>
    <nav>
        <ul class="About-us">
            <li><a href="#">About Us</a></li>
            <li><a href="blogs.php">Blog</a></li>
        </ul>
        <?php if (isset($_SESSION["role"])): ?>
            <?php if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2): ?>
                <ul style="align-items: center; display: flex;">
                    <li class="inline-flex">
                        <a href="dashboard/src/setting/profile.php">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" style="margin-left:5px;" class="sc-d806251e-0 dQZEIF">
                                <path d="M12 21a9 9 0 100-18 9 9 0 000 18z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path>
                                <path d="M17 19v-1.54c0-.786-.281-1.538-.781-2.093-.5-.555-1.178-.867-1.886-.867H9.667c-.708 0-1.386.312-1.886.867A3.131 3.131 0 007 17.459V19M12 11.5a3 3 0 100-6 3 3 0 000 6z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path>
                            </svg>
                            <span class="Profil"></span>
                        </a>
                    </li>
                    <li><a href="dashboard/src/dashboard.php">Dashboard</a></li>
                    <span class="sign-up"><a href="blog/logout.php">Logout</a></span>
                </ul>
            <?php else: ?>
                <ul style="align-items: center; display: flex;">
                    <li class="inline-flex">
                        <a href="Admin-panel">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" style="margin-left:5px;" class="sc-d806251e-0 dQZEIF">
                                <path d="M12 21a9 9 0 100-18 9 9 0 000 18z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path>
                                <path d="M17 19v-1.54c0-.786-.281-1.538-.781-2.093-.5-.555-1.178-.867-1.886-.867H9.667c-.708 0-1.386.312-1.886.867A3.131 3.131 0 007 17.459V19M12 11.5a3 3 0 100-6 3 3 0 000 6z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path>
                            </svg>
                            <span class="Profil"></span>
                        </a>
                    </li>
                    <span class="sign-up"><a href="blog/logout.php">Logout</a></span>
                </ul>
            <?php endif; ?>
        <?php else: ?>
            <span class="sign-up"><a href="signup_login/sin up/sign-up.php">Sign Up</a></span>
            <span class="sign-up"><a href="signup_login/log in/log-in.php">Login</a></span>
        <?php endif; ?>
    </nav>
</header>
</body>
</html>
