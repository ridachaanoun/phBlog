<?php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Blog-Post.css">
</head>

    <header>
        <nav>
            <ul class="About-us">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Blog</a></li>
                <li>

                </li>
            </ul>
            <h2 class="logo"><a href=""> Logo</a></h2>
            <span class="profile">
                <a href="/phBlog/signup_login/profile/show.php?ID_user=<?php echo htmlspecialchars($ID_user); ?>" class="text-gray-700 hover:text-gray-900">Edit Profile</a>
            </span>
            <span class="sign-up"> <a href="signUp.html">Main</a> </span>
        </nav>
        <?php echo $style ;?>
    </header>
    <main>
        <section class="profile">
            <div class="topdiv">
                <form action="">
                    <select name="" id="">
                        <option value="##"><?php echo $category_row["Categoryname"]; ?></option>
                    </select>
                </form>
                <p class="title"><?php echo $articles_row["Titre"]; ?></p>
                <div class="informaition">
                    <div>
                        <span>
                            <h6><?php echo $user_row["username"]; ?></h6>
                            <p><?php echo $articles_row["Date_created"]; ?></p>
                        </span>
                    </div>
                    <div>
                        <ul>
                            <li><img src="icons/link.svg" alt=""></li>
                            <li><img src="icons/linkedin.svg" alt=""></li>
                            <li><img src="icons/twitter.svg" alt=""></li>
                            <li><img src="icons/facebook.svg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-content">
            <div class="container">
                <img class="blogimg" src="img/blogimg" alt="">
                <div class="blacklike-and-comment">
                    <!-- show likeCount -->
                    <span><img src="icons/black-like.svg" alt=""><?php echo $userLiked ;?></span>
                    <span><img src="icons/black-comment.svg" alt=""></span>
                </div>
            </div>
            <hr class="center-line">
            <div class="whitelike-and-comment">

                <!-- add like -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <button type="submit" name="like" class="liked"> <span><img src="icons/white-like.svg" alt="">like</span></button>
                </form>

                    
            </div>
            <div class="content">
                <p><?php echo $articles_row["Contenu_arti"]; ?></p>
            </div>
        <section class="comment-section">
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <h6><?php echo htmlspecialchars($comment->username, ENT_QUOTES, 'UTF-8'); ?> commented:</h6>
                        <p><?php echo htmlspecialchars($comment->Contenu_com, ENT_QUOTES, 'UTF-8'); ?></p>
                        <small>Posted on: <?php echo htmlspecialchars($comment->Date_created_com, ENT_QUOTES, 'UTF-8'); ?></small>
                    </div>
                <?php endforeach; ?>
        </section>
        </section>
        <section class="Join_the_Conversation">
            <p class="Join">Join the Conversation</p>
            <p class="Share">Share your thoughts and engage with the community</p>
            <div class="btn-container">
                <span class="comment-btn">comment</span>
                <span class="like-btn">like</span>
            </div>
        </section>
        <section>
            <form class="add-comment" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <p class="commentes">Comments</p>
                <p class="submit-comment"> Submit a comment</p>

                <?php
                if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <textarea rows="10" cols="50" placeholder="Leave a comment" name="comment"></textarea>
                <input class="comment-btn" type="submit" value="Submit" name="add">
            </form>
        </section>
    </main>
    <footer>
        <div class="last-div">
            <p>© 2024 Relume. All rights reserved.</p>
            <ul>
                <li>Privacy Policy</li>
                <li>Terms of Service</li>
                <li>Cookies Settings</li>
            </ul>
        </div>

</body>
</html>
