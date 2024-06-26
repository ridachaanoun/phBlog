<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to retrieve articles from the database with pagination
function getArticlesWithPagination($con, $offset, $limit)
{
    $stmt = $con->prepare("SELECT * FROM articles  LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteArticle($con, $articleID)
{
    $stmt = $con->prepare("DELETE FROM articles WHERE ID_arti = :articleID");
    $stmt->bindParam(':articleID', $articleID, PDO::PARAM_INT);
    $stmt->execute();
}

$articlesPerPage = 4;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $articlesPerPage;

$articles = getArticlesWithPagination($con, $offset, $articlesPerPage);

$totalArticles = $con->query("SELECT COUNT(*) FROM articles")->fetchColumn();

$totalPages = ceil($totalArticles / $articlesPerPage);

if (isset($_POST['delete'])) {
    $articleID = $_POST['articleID'];

    deleteArticle($con, $articleID);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Test.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/User.css">
    <style>
        .container tbody tr button {
            border: none;
            /* Remove border */
            border-radius: 0;
            /* Optionally remove border radius */
            border-width: 0;
            /* Optionally set border width to 0 */
            outline: none;
            /* Optionally remove outline on focus */
            background-color: white;
            width: 0px;
            height: 0px;
        }

        tbody tr:nth-child(odd) button {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <?php include '../aside2.php'; ?>

    <section class="expression">
<p>View,Delete,You can use all features as Admin!!</p>
</section>
    <div class="container scrollable-container">
        
        <table class="articles-table">
            <thead>
                <tr class="items">
                    <th class="title" colspan="2">ALL Articles</th>
                    <th class="th" colspan="9"><a href="ajouter.php" data-page="ajouter.php" class="text-dark"><button>+ADD</button></a></th>
                </tr>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>SubTitle</th>
                    <th>Date Create</th>
                    <th>Id_User</th>
                    <th>Name_category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <td><?php echo $article['ID_arti']; ?></td>
                        <td>
                            <?php
                            // $imagePath = $article['image_path'];
                            $imagePath = '../../../' . $article['image_path']; 
                            if (file_exists($imagePath)) {
                                echo '<img src="'. $imagePath . '" style="width: 100px; height: auto;">';
                            } else {
                                echo 'Image not found: ' . $imagePath;
                            }
                            ?>
                        </td>
                        <td><?php echo $article['Titre']; ?></td>
                        <td class="Contenu_arti"><?php echo $article['Contenu_arti']; ?></td>
                        <td><?php echo $article['subtitle']; ?></td>
                        <td><?php echo $article['Date_created']; ?></td>
                        <td><?php echo $article['ID_user']; ?></td>
                        <td><?php echo $article['ID_Category']; ?></td>
                        <td class="forms">
                            <form method="get" action="edit_article.php" class="inline-flex">
                                <input type="hidden" name="articleID" value="<?php echo $article['ID_arti']; ?>">
                                <a href="edit_article.php?articleID=<?php echo $article['ID_arti']; ?>" class="hover:text-blue-700 p-2">
                                    <svg style="margin-top: 5px;" width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Edit</title>
                                        <path d="M17,22H5a3,3,0,0,1-3-3V7A3,3,0,0,1,5,4H9A1,1,0,0,1,9,6H5A1,1,0,0,0,4,7V19a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V15a1,1,0,0,1,2,0v4A3,3,0,0,1,17,22Z" fill="#54AE88" />
                                        <path d="M14.6,5.87l-4.95,5a.41.41,0,0,0-.13.23l-1,3.82a.48.48,0,0,0,.13.48A.47.47,0,0,0,9,15.5a.32.32,0,0,0,.13,0l3.82-1a.41.41,0,0,0,.23-.13L18.13,9.4Z" fill="#54AE88" />
                                        <path d="M21,4.45,19.55,3a1.52,1.52,0,0,0-2.13,0L16,4.45,19.55,8,21,6.58A1.52,1.52,0,0,0,21,4.45Z" fill="#54AE88" />
                                    </svg>
                                </a>
                            </form>
                            <form method="post" action="" class="inline-flex ml-2" onsubmit="return confirm('Are you sure you want to delete this article?');">
    <input type="hidden" name="articleID" value="<?php echo $article['ID_arti']; ?>">
    <button type="submit" name="delete" class="text-red-500 hover:text-red-700 p-2 no-border">
        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.7 23.3H6.3C5.3 23.3 4.6 22.5 4.6 21.5V6.6H19.4V21.5C19.4 22.5 18.6 23.3 17.7 23.3ZM20.4 6V4.2C20.4 3.5 19.8 2.8 19.1 2.8H15.4L14.6 1.4C14.4 1 14.1 0.8 13.6 0.8H10.4C9.9 0.8 9.6 1 9.4 1.4L8.6 2.8H4.9C4.2 2.8 3.6 3.5 3.6 4.2V6C3.6 6.3 3.9 6.6 4.2 6.6H19.8C20.1 6.6 20.4 6.3 20.4 6ZM8.8 10.2V19.7M12 10.2V19.7M15.2 10.2V19.7" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</form>



                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </div>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo $page == $i ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

</body>

</html>