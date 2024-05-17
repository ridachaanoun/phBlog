<?php include("blog/includes/header.php"); ?>

<?php 
    require "connection.php";

    // Initialize $rows to an empty array
    $rows = [];

    // Execute the query to fetch articles
    try {
        $posts = $conn->query("SELECT * FROM articles");
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
    <link rel="stylesheet" href="blog/css/Blogs.css">
    <style>
     
    </style>
</head>
<body>
    <!-- Include the header -->
    <?php include("blog/includes/header.php"); ?>

    <main>
        <section class="Third-section">
            <div>
                <h1>Discover New Blog Posts</h1>
                <h2>Stay up to date with our latest articles.</h2>
            </div>
            <div class="cards2">
                <?php 
                // Slice the array to get only the first nine elements
                $limitedRows = array_slice($rows, 0, 9);
                foreach ($limitedRows as $row): 
                    // Fetch category information for the current article
                    $stmt = $conn->prepare("SELECT * FROM Categories WHERE ID_Category = :id_category");
                    $stmt->execute(['id_category' => $row->ID_Category]);
                    $category_row = $stmt->fetch(PDO::FETCH_ASSOC);

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
                    endif;
                endforeach; 
                ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("blog/includes/footer.php"); ?>
</body>
</html>
