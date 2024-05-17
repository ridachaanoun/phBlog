
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="blog/css/home.css">
</head>
<body>
<header>
        <nav>
            <ul class="About-us" >
                <li><a href="#" style="display: block; width: 80px;">About Us</a></li>
                <li><a href="blogs.php">Blog</a></li>
            <li>
                <select>
                    <option value="english">Categories</option>
                    <option value="english"></option>
                    <option value="english"></option>
                  </select>
            </li>
            <li class="inline-flex" style=" margin-left: 930px; margin-top: 4px;"><a href="/phBlog/signup_login/profile/show.php?ID_user=<?php echo htmlspecialchars($ID_user); ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" style="margin-left:5px;" class="sc-d806251e-0 dQZEIF"><path d="M12 21a9 9 0 100-18 9 9 0 000 18z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path><path d="M17 19v-1.54c0-.786-.281-1.538-.781-2.093-.5-.555-1.178-.867-1.886-.867H9.667c-.708 0-1.386.312-1.886.867A3.131 3.131 0 007 17.459V19M12 11.5a3 3 0 100-6 3 3 0 000 6z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="colorStroke"></path></svg><span class="Profil">Profil</span></div></a></li>

            </ul>
            <span class="sign-up" style=" margin-left: 980px;"> <a href="signup_login/sin up/sign-up.php">Sign Up</a> </span>
            <span class="sign-up"> <a href="signup_login/log in/log-in.php">Login</a> </span>
        </nav>
    </header>