<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to retrieve categories from the database with pagination
function getCategoriesWithPagination($con, $offset, $limit)
{
    $stmt = $con->prepare("SELECT * FROM categories LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to delete a category by ID
function deleteCategory($con, $categoryID)
{
    $stmt = $con->prepare("DELETE FROM categories WHERE ID_Category = :categoryID");
    $stmt->bindParam(':categoryID', $categoryID, PDO::PARAM_INT);
    $stmt->execute();
}

// Number of categories to display per page
$categoriesPerPage = 4;

// Current page number (default is 1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for pagination
$offset = ($page - 1) * $categoriesPerPage;

// Retrieve categories with pagination
$categories = getCategoriesWithPagination($con, $offset, $categoriesPerPage);

// Total number of categories
$totalCategories = $con->query("SELECT COUNT(*) FROM categories")->fetchColumn();

// Calculate total pages
$totalPages = ceil($totalCategories / $categoriesPerPage);

// Check if delete request is sent
if (isset($_POST['delete'])) {
    // Retrieve the category ID to be deleted
    $categoryID = $_POST['categoryID'];

    // Call the deleteCategory function to delete the category
    deleteCategory($con, $categoryID);

    // Redirect back to the same page to refresh the content
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
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
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

        .container .thh a button {
            border: 1px solid #007bff;
            color: black;
            width: 85px;
            height: 30px;
            background-color: #007bff;
            font-weight: bolder;
            font-size: 13px;
            border-radius: 7px;
            margin-left: 85%;
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
                    <th class="title" colspan="1">ALL Categories</th>
                    <th class="thh" colspan="9"><a href="ajouter.php" data-page="ajouter.php" class="text-dark"><button>+ADD</button></a></th>
                </tr>

                <tr>
                    <th>ID</th>
                   
                    <th>Category Name</th>
                    <th>ID Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr class="rigth">
                     <td> 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <?php echo $category['ID_Category']; ?></td>
                        <td>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
                        <?php echo $category['Categoryname']; ?></td>
                        <td>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    
                        <?php echo $category['ID_parent']; ?></td>
                       
                        <td class="forms">                        &nbsp; &nbsp; &nbsp;
                        <form method="get" action="edit_article.php" class="inline-flex">
                                <input type="hidden" name="ID_Category" value="<?php echo $category['ID_Category']; ?>">
                                <a href="edit.php?ID_Category=<?php echo $category['ID_Category'] ?>" class="hover:text-blue-700 p-2">
                                    <svg style="margin-top: 5px;" width="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Edit</title>
                                        <path d="M17,22H5a3,3,0,0,1-3-3V7A3,3,0,0,1,5,4H9A1,1,0,0,1,9,6H5A1,1,0,0,0,4,7V19a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V15a1,1,0,0,1,2,0v4A3,3,0,0,1,17,22Z" fill="#54AE88" />
                                        <path d="M14.6,5.87l-4.95,5a.41.41,0,0,0-.13.23l-1,3.82a.48.48,0,0,0,.13.48A.47.47,0,0,0,9,15.5a.32.32,0,0,0,.13,0l3.82-1a.41.41,0,0,0,.23-.13L18.13,9.4Z" fill="#54AE88" />
                                        <path d="M21,4.45,19.55,3a1.52,1.52,0,0,0-2.13,0L16,4.45,19.55,8,21,6.58A1.52,1.52,0,0,0,21,4.45Z" fill="#54AE88" />
                                    </svg>
                                </a>
                            </form>   
                        <form method="post" action="">
                                <input type="hidden" name="categoryID" value="<?php echo $category['ID_Category']; ?>">
                                <button type="submit" name="delete">
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