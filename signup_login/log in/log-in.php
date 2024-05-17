<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/log-in.css">
</head>
<body><a href="../../connection.php"></a>
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
            <span class="sign-up"> <a href="../sin up/sign-up.php">Sign Up</a> </span>
        </nav>

    </header>
    <main>
        <section>
            <img class="welcome" src="../img/images.jpeg" alt="">
            <p class="log-in">Log in</p>
            <p class="log-in-now">Log in now </p>
            <p class="enter-ur-inf">enter your email and password to login. </p>
            <!-- this is form -->
            <form action="loginn.php" method="post">
            <?php
                if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

                <label  for="email">Email</label>
                <input  type="email" id="email" name="email">
                <label  for="password">Password</label>
                <input  type="password" name="pass">
                <input class="submit" type="submit" value="Log in" name="add">
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
</footer>
</body>
</html>