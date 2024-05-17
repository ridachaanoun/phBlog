<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/sing-up.css">
</head>
<body>
    <header>
        <nav>
            <ul class="About-us">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Blog</a></li>
            <li>
                <select>
                    <option value="english">Services</option>
                    <option value="english"></option>
                    <option value="english"></option>
                  </select>
            </li>

            </ul>
            <h2 class="logo"><a href=""> Logo</a></h2>
            <span class="sign-up"> <a href="../log in/log-in.php">Log in</a> </span>
        </nav>

    </header>
    <main>
        <section>
            <img class="welcome" src="../img/images.jpeg" alt="">
            <p class="log-in">Sign Up</p>
            <p class="log-in-now">Sin Up now </p>
            <p class="enter-ur-inf">enter your username / email and password to sign up.  </p>
            <form action="signUp.php" method="post">

            <?php
                if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

                <label  for="username">Username</label>
                <input  type="text" id="username" name="username">
                <label  for="email">Email</label>
                <input  type="email" id="email" name="email">
                <label  for="password">Password</label>
                <input  type="password" name="pass">
                <input  class="submit"type="submit" value="Sign Up" name="add">
            </form>
        </section>
    </main>
   <!-- footer -->
   <footer>
            <div class="last-div">
                <p>© 2024 Relume. All rights reserved.</p>
                <ul >
                    <li>Privacy Policy</li>
                    <li>Terms of Service</li>
                    <li>Cookies Settings</li>
                </ul>
            </div>
</footer></body>
</html>