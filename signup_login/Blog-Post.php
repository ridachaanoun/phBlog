<?php
require "../connection.php";
session_start();

if (isset($_GET["post_id"])) {
    $_SESSION["id_art"]=$_GET["post_id"];
}
// add like 
if(isset($_POST["like"])){
    try {

        $check_id = $conn->prepare("SELECT * FROM likes WHERE ID_arti = :id_arti AND ID_user = :ID_user" );
        $check_id->execute([
            ':id_arti' => $_SESSION["id_art"],
            ':ID_user' => $_SESSION["ID_user"]
        ]);

        if($check_id->rowCount()>0){
            
            // delet like 
            $check_like = $conn->prepare("DELETE  FROM likes WHERE ID_arti = :id_arti AND ID_user = :ID_user" );
            $check_like->execute([
                ':id_arti' => $_SESSION["id_art"],
                ':ID_user' => $_SESSION["ID_user"]
            ]);
            $style = "    <style>
            .liked {
                background-color: rgb(255, 0, 0);
                color: white;
            }
        </style>";

        }else{
            $insert = $conn->prepare("INSERT INTO likes (ID_user, ID_arti) VALUES (:ID_user, :ID_arti)");
            $insert->execute([
                ':ID_user' => $_SESSION["ID_user"],
                ':ID_arti' => $_SESSION["id_art"]
            ]);
            // echo "Like added successfully";

        }

    } catch (PDOException $e) {
        die("Error adding like: " . $e->getMessage());
    }

}
// count likes 
$likeStmt = $conn->prepare("SELECT * FROM likes WHERE ID_arti = :id_arti");
$likeStmt->execute([':id_arti' => $_SESSION["id_art"]]);
$userLiked  = $likeStmt->rowCount();


// Fetch article data
$articleStmt = $conn->prepare("SELECT * FROM articles WHERE ID_arti = :id_arti");
$articleStmt->execute([':id_arti' => $_SESSION["id_art"]]);
$articles_row = $articleStmt->fetch(PDO::FETCH_ASSOC);


if (!$articles_row) {
    die("Error fetching article data");
}

// Fetch user data
$userStmt = $conn->prepare("SELECT * FROM users WHERE ID_user = :id_user");
$userStmt->execute([':id_user' => $articles_row["ID_user"]]);
$user_row = $userStmt->fetch(PDO::FETCH_ASSOC);

if (!$user_row) {
    die("Error fetching user data");
}

// Add comment
if (isset($_POST["add"])) {
    $comment = $_POST['comment'];
    $response = [];

    if (empty($comment)) {
        $response['status'] = 'error';
        $response['message'] = 'Comment cannot be empty.';
        header("location:Blog-Post.php.?error=".$response['message']);
    } else {
        $insert = $conn->prepare("INSERT INTO comments (Contenu_com, ID_user, ID_arti, Date_created_com) VALUES (:Contenu_com, :ID_user, :ID_arti, :Date_created_com)");
        $insert->execute([
            ':Contenu_com' => $comment,
            ':ID_user' => $_SESSION["ID_user"],
            ':ID_arti' => $_SESSION["id_art"],
            ':Date_created_com' => date("Y-m-d")
        ]);
    }
}
// Fetch category data
$categoryStmt = $conn->prepare("SELECT * FROM categories WHERE ID_Category = :id_category");
$categoryStmt->execute([':id_category' => $articles_row["ID_Category"]]);
$category_row = $categoryStmt->fetch(PDO::FETCH_ASSOC);

if (!$category_row) {
    die("Error fetching category data");
}

// Fetch comments along with the username of the user who posted the comment
$commentsStmt = $conn->prepare("
    SELECT comments.*, users.username 
    FROM comments 
    JOIN users ON comments.ID_user = users.ID_user 
    WHERE comments.ID_arti = :id_arti
");
$commentsStmt->execute([':id_arti' => $_SESSION["id_art"]]);
$comments = $commentsStmt->fetchAll(PDO::FETCH_OBJ);

$style ="";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Blog-Post.css">
</head>
<body>
    <header>
        <nav>
            <ul class="About-us">
                <li><a href="#">About Us</a></li>
                <li><a href="../blogs.php">Blog</a></li>
                <li>

                </li>
            </ul>
            <h2 class="logo"><a href=""> Logo</a></h2>
            <span class="sign-up"> <a href="../index.php">Main</a> </span>
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
        <!-- data of post -->
        <section class="blog-content">
            <div class="container">
                <img class="blogimg" src="../<?php echo $articles_row["image_path"];?>" alt="">
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
            <!-- add comment -->
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