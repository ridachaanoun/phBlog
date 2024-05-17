<?php
session_start();

// Check if the ID_user is set in the session
if(isset($_SESSION['ID_user'])) {
    // Retrieve the ID_user from the session
    $ID_user = $_SESSION['ID_user'];

    $con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $userStmt = $con->prepare("SELECT * FROM users WHERE ID_user = :id_user");
    $userStmt->execute([':id_user' => $ID_user]);
    $user_row = $userStmt->fetch(PDO::FETCH_ASSOC);

    // Check if user data is fetched successfully
    if($user_row) {
        $username = $user_row['username'];
    } else {
        // If user data is not found, handle the error
        $username = "Unknown";
    }
} else {
    // If the ID_user is not set in the session, redirect the user to the login page
    header("location: ../log-in.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./blog/css/home.css">

</head>
<body>

        <!-- navbar -->
    <header>
        <nav>
            <ul class="About-us">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Blog</a></li>
            <li>
                <select>
                    <option value="english">Categories</option>
                    <option value="english"></option>
                    <option value="english"></option>
                  </select>
            </li>

            </ul>
            <span class="profile">
                <a href="/phBlog/signup_login/profile/show.php?ID_user=<?php echo htmlspecialchars($ID_user); ?>" class="text-gray-700 hover:text-gray-900">Edit Profile</a>
            </span>
            <span class="sign-up"> <a href="signup_login/sin up/sign-up.php">Sign Up</a> </span>
        </nav>
    </header>
        <main>
            <!--first-section -->
            <section class="first-section">
                <div>
                    <img class="im-header" src="img/svgviewer-png-output.png" alt="">
                </div>
                <div class="title">
                    <div>
                        <h1 >Discover the Latest and<br> Greatest Blog Posts</h1>
                    </div>
                    <div>
                        <h3>Explore our collection of captivating articles and stay up to date with the<br> latest trends and insights.</h3>
                    <div class="btns">
                        <button class="black-btn">Read More </button>
                        <button class="white-btn"><a href="http://127.0.0.1:5500/signUp.html">Sign Up</a> </button>
                    </div>
                    </div>
                </div>
                <hr>
            </section>

            <!-- second-section -->
            <section class="second-section">
                <div>
                    <div class="sub-second-section">
                        <h1>Discover the Power of Advanced Article Management and User Interactivity</h1>
                        <h3>Our personal blog management system offers a range of advanced features designed to enhance your blogging experience. From adding articles with images, titles, subtitles, and descriptions to managing comments and registered users, our system has got you covered.</h3>
                    </div>

                    <div class="sub-sub-second-section">
                        <div class="Advanced">
                            <h2>Advanced Features</h2>
                            <h3>Effortlessly add, edit, and delete posts while managing comments and registered users.</h3>
                        </div>
                        <div class="User">
                            <h2>User Interactivity</h2>
                            <h3>Engage with your audience through comments and likes, creating a vibrant community.</h3>
                        </div>
                    </div>
                </div>
                

                <div>
                    <img src="img/svgviewer-png-output (1).png" alt="">
                </div>
            </section>
            <hr>



            <!-- 3rd section -->

                <section class="Third-section">
                    <div>
                        <h3>Latest</h3>
                        <h1>Discover New Blog Posts</h1>
                        <h2>Stay up to date with our latest articles.</h2>
                    </div>

                    <div class="cards">
                    <div class="card-1">
                        <div>
                            <img src="img/svgviewer-png-output (2).png" class="card-img-top">
                            <div class="Categories">
                                <h5>Technology</h5>
                            </div>
                            <div class="card-body">
                              <h3>10 Tips for Successful Blogging</h3>
                              <p class="card-text">Learn how to create engaging content and grow your audience.</p>
                              <p class="Read-more">Read more ></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-1">
                        <div>
                            <img src="img/svgviewer-png-output (2).png" class="card-img-top">
                            <div class="Categories">
                                <h5>Technology</h5>
                            </div>
                            <div class="card-body">
                              <h3>10 Tips for Successful Blogging</h3>
                              <p class="card-text">Learn how to create engaging content and grow your audience.</p>
                              <p class="Read-more">Read more ></p>
                            </div>
                        </div>
                    </div>

                    <div class="card-1">
                        <div>
                            <img src="img/svgviewer-png-output (2).png" class="card-img-top">
                            <div class="Categories">
                                <h5>Technology</h5>
                            </div>
                            <div class="card-body">
                              <h3>10 Tips for Successful Blogging</h3>
                              <p class="card-text">Learn how to create engaging content and grow your audience.</p>
                              <p class="Read-more">Read more ></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="white-btn" style="margin-top: 5%;">View All</button>
                </div>

                <div class="title-2">
                    <div>
                        <h1 >Join our community today!</h1>
                    </div>
                    <div >
                        <h3>Sign up now to unlock exclusive features and engage with our vibrant community of bloggers.</h3>
                    <div class="btns">
                        <button class="black-btn"><a href="http://127.0.0.1:5500/signUp.html"></a>Sign Up </a></button>
                        <button class="white-btn">Read More </button>
                    </div>
                    </div>
                </div>
                </section>
        </main>

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