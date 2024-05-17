<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to add a new category
function addCategory($con, $categoryName, $parentID)
{
    $stmt = $con->prepare("INSERT INTO categories (Categoryname, ID_parent) VALUES (:categoryName, :parentID)");
    $stmt->bindParam(':categoryName', $categoryName);
    $stmt->bindParam(':parentID', $parentID, PDO::PARAM_INT); // Adjusted to specify integer parameter type
    $stmt->execute();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $categoryName = $_POST['categoryName'];
    $parentID = $_POST['parentID'];

    // Call the addCategory function to add the new category
    addCategory($con, $categoryName, $parentID);

    // Redirect to the categories page after adding the category
    header("Location: comments.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ajouter.css">
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
<?php include '../sidebar.php'; ?>
        <?php include '../navbar.php'; ?>
    <div class="container scrollable-container">
        <h2>Ajouter Nouvelle Category</h2>
        <form method="post" action="categories.php">
        <div class="mb-4">
            <label for="categoryName">Nom de la Category:</label><br>
            <input type="text" name="categoryName" id="categoryName" required><br>
        </div>
        <div class="mb-4">
            <label for="parentID">ID Parent:</label><br>
            <input type="number" name="parentID" id="parentID"><br>
        </div>
        <div class="mb-4">
        <button type="submit" name="Ajouter"  class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
                Add Article   
            </button>
            <div class="mb-4">
        </form>
    </div>
</body>

</html>
