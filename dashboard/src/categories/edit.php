<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to retrieve category details
function getCategoryDetails($con, $categoryID) {
    $stmt = $con->prepare("SELECT * FROM categories WHERE ID_Category = :categoryID");
    $stmt->bindParam(':categoryID', $categoryID);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update a category
function updateCategory($con, $categoryID, $categoryName, $parentID) {
    $stmt = $con->prepare("UPDATE categories SET Categoryname = :categoryName, ID_parent = :parentID WHERE ID_Category = :categoryID");
    $stmt->bindParam(':categoryID', $categoryID);
    $stmt->bindParam(':categoryName', $categoryName);
    $stmt->bindParam(':parentID', $parentID, PDO::PARAM_INT);
    return $stmt->execute();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];
    $parentID = $_POST['parentID'];

    // Call the updateCategory function to update the category
    if (updateCategory($con, $categoryID, $categoryName, $parentID)) {
        // Redirect to the categories page after updating the category
        header("Location: comments.php");
        exit;
    } else {
        echo "Error updating category.";
    }
}

// Check if category ID is provided in URL
if (isset($_GET['ID_Category'])) {
    $categoryID = $_GET['ID_Category'];
    // Retrieve category details
    $category = getCategoryDetails($con, $categoryID);
} else {
    // Redirect if no category ID is provided
    header("Location: comments.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="../css/ajouter.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
    <?php include '../sidebar.php'; ?>
    <?php include '../navbar.php'; ?>
    <div class="container scrollable-container">
        <h2>Edit Category</h2>
        <form method="post" action="edit.php">
            <input type="hidden" name="categoryID" value="<?php echo $category['ID_Category']; ?>">
            <div class="mb-4">
                <label for="categoryName">Nom de la Category:</label><br>
                <input type="text" name="categoryName" id="categoryName" value="<?php echo $category['Categoryname']; ?>" required><br>
            </div>
            <div class="mb-4">
                <label for="parentID">ID Parent:</label><br>
                <input type="number" name="parentID" id="parentID" value="<?php echo $category['ID_parent']; ?>"><br>
            </div>
            
            <div class="mb-4">
        <button type="submit" name="update_category"  class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
        Update Article   
    </button>
        </form>
    </div>
</body>

</html>
