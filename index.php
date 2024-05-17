<?php
session_start();

if (isset($_SESSION['ID_user'])) {
    $ID_user = $_SESSION['ID_user'];
    $con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userStmt = $con->prepare("SELECT * FROM users WHERE ID_user = :id_user");
    $userStmt->execute([':id_user' => $ID_user]);
    $user_row = $userStmt->fetch(PDO::FETCH_ASSOC);
    if ($user_row) {
        $username = $user_row['username'];
        $role = $user_row['ID_role']; // Get the user's role
    } else {
        $username = "Unknown";
    }
} else {
    header("location: ../log-in.php");
    exit;
}

// Function to redirect based on user's role
function redirectToProfile($role) {
    if ($role === '3') {
        header("location: /phBlog/signup_login/profile/show.php?ID_user=" . $_SESSION['ID_user']);
    } elseif ($role === '2') {
        header("location: /phBlog/dashboard/src/dashboard.php");
    } else {
        // Handle other roles or unexpected scenarios
        echo "Unauthorized access!";
    }
    exit;
}

// Check if the user is logged in and has a role
if (isset($_SESSION['ID_user']) && isset($role)) {
    // Check the user's role and redirect accordingly
    redirectToProfile($role);
}
$rows = [];

// Execute the query to fetch articles
try {
    $posts = $con->query("SELECT * FROM articles");
    $rows = $posts->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="blog/css/blogs.css">
</head>
<body>
<header>
    <nav>
        <ul class="About-us">
            <li><a href="#" style="display: block; width: 80px;">About Us</a></li>
            <li><a href="blogs.php">Blog</a></li>
            <li>
                <select>
                    <option value="english">Categories</option>
                    <option value="english"></option>
                    <option value="english"></option>
                </select>
            </li>
            <?php if (isset($_SESSION['ID_user'])): ?>
                <span class="profile">
                    <a href="/phBlog/signup_login/profile/show.phpecialchars($ID_user); ?>" class="text-gray-700 hover:text-gray-900">Edit Profile</a>
                </span>
            <?php endif; ?>
        </ul>
        <span class="sign-up" style="margin-left: 980px;"> <a href="signup_login/sin up/sign-up.php">Sign Up</a> </span>
        <span class="sign-up"> <a href="signup_login/log in/log-in.php">Login</a> </span>
    </nav>
</header>

<div>
    <h1>Discover the Latest and<br> Greatest Blog Posts</h1>
</div>
<div>
    <h3>Explore our collection of captivating articles and stay up to date with the<br> latest trends and insights.</h3>
    <div class="btns">
        <button class="black-btn" onclick="scrollToSection()">Read More</button>
        <script>
        function scrollToSection() {
            document.getElementById('second-section').scrollIntoView({ behavior: 'smooth' });
        }
        </script>
        <button class="white-btn"><a href="signup_login/sin up/sign-up.php">Sign Up</a></button>
    </div>
</div>
<hr>

<!-- Second Section -->
<section id="second-section" class="second-section">
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
        <img src="blog/img/ben-kolde-FaPxZ88yZrw-unsplash.jpg" alt="">
    </div>
</section>
<hr>

<!-- Third Section -->
<section class="Third-section">
    <div>
        <h3>Latest</h3>
        <h1>Discover New Blog Posts</h1>
        <h2>Stay up to date with our latest articles.</h2>
    </div>
    <div class="cards">
        <?php 
        // Slice the array to get only the first three elements
        $limitedRows = array_slice($rows, 0, 3);
        foreach ($limitedRows as $row): 
            // Ensure $con is used for the category query as well
            $Existing = $con->prepare("SELECT * FROM Categories WHERE ID_Category = :id_category");
            $Existing->execute(['id_category' => $row->ID_Category]);
            $category_row = $Existing->fetch(PDO::FETCH_ASSOC);

            // Check if category information is fetched successfully
            if ($category_row !== false):
        ?>
        <div class="card-1">
            <div>
                <img src="<?php echo htmlspecialchars($row->image_path, ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="Article Image">
                <div class="Categories">
                    <!-- Display category name -->
                    <h5><?php echo htmlspecialchars($category_row["Categoryname"], ENT_QUOTES, 'UTF-8'); ?></h5>
                </div>
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($row->Titre, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="card-text"><?php echo htmlspecialchars($row->Contenu_arti, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="Read-more">Read more ></p>
                </div>
            </div>
        </div>
        <?php 
            else:
                // Handle the case when category information is not found
                echo "<div class='card-1'>No category found</div>";
            endif;
        endforeach; 
        ?>
    </div>
    <div>
        <button class="white-btn" style="margin-top: 5%;"><a href="blogs.php">View All</a></button>
    </div>
    <div class="title-2">
        <div>
            <h1>Join our community today!</h1>
        </div>
        <div>
            <h3>Sign up now to unlock exclusive features and engage with our vibrant community of bloggers.</h3>
            <div class="btns">
                <button class="black-btn"><a href="blogs.php" style="color: white;">Read More</a></button>
                <button class="white-btn"><a href="signup_login/sin up/sign-up.php">Sign Up</a></button>
            </div>
        </div>
    </div>
</section>
</main>

<!-- Footer -->
<?php include("blog/includes/footer.php"); ?>

</body>
</html>
