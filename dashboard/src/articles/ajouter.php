<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to get users for select option
function getUsers($con) {
    $stmt = $con->query("SELECT ID_user, username FROM users ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get categories for select option
function getCategories($con) {
    $stmt = $con->query("SELECT ID_Category, Categoryname FROM categories");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Create operation
if (isset($_POST['add_article'])) {
    $titre = $_POST['titre'];
    $Contenu_arti = $_POST['Contenu_arti'];
    $subtitle = $_POST['subtitle'];
    $Date_created = date("Y-m-d"); 
    $ID_user = $_POST['ID_user'];
    $ID_Category = $_POST['ID_Category'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_path = $target_dir . uniqid() . '.' . $imageFileType;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
        $stmt = $con->prepare("INSERT INTO articles (Titre, image_path, Contenu_arti, subtitle, Date_created, ID_user, ID_Category) VALUES (:titre, :image_path, :Contenu_arti, :subtitle, :Date_created, :ID_user, :ID_Category)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':image_path', $image_path);
        $stmt->bindParam(':Contenu_arti', $Contenu_arti);
        $stmt->bindParam(':subtitle', $subtitle);
        $stmt->bindParam(':Date_created', $Date_created);
        $stmt->bindParam(':ID_user', $ID_user);
        $stmt->bindParam(':ID_Category', $ID_Category);

        if ($stmt->execute()) {
            // Redirect back to users.php with success message
            header("Location: articles.php?success=update");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            echo "Error updating user.";
        }
    } else {
        echo "Error uploading image.";
    }
}

// Read operation (to display existing articles in a table)
$stmt = $con->query("SELECT * FROM articles");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/ajouter.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
</head>
<style>

</style>
<body>
<?php include '../sidebar.php'; ?>
        <?php include '../navbar.php'; ?>
            <div class="container scrollable-container">
<h2>Add Article</h2>
<form method="post" enctype="multipart/form-data" class="max-w-md mx-auto" action="">
            <div class="mb-4">
                <label for="titre" class="block font-semibold mb-2">Titre:</label></br>
                <input type="text" id="titre" name="titre" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="image" class="block font-semibold mb-2">Image:</label></br>
                <input type="file" id="image" name="image" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="Contenu_arti" class="block font-semibold mb-2">Contenu:</label></br>
                <textarea id="Contenu_arti" name="Contenu_arti" class="w-full border rounded-md px-3 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="subtitle" class="block font-semibold mb-2">Sous-titre:</label></br>
                <input type="text" id="subtitle" name="subtitle" class="w-full border rounded-md px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="Date_created" class="block font-semibold mb-2">Date de création:</label></br>
                <input type="date" id="Date_created" name="Date_created" class="w-full border rounded-md px-3 py-2" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>

            <div class="mb-4">
                <label for="ID_user" class="block font-semibold mb-2">Utilisateur:</label></br>
                <select id="ID_user" name="ID_user" class="w-full border rounded-md px-3 py-2">
                    <?php foreach (getUsers($con) as $user): ?>
                        <option value="<?php echo $user['ID_user']; ?>"><?php echo $user['username']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="ID_Category" class="block font-semibold mb-2">Catégorie:</label></br>
                <select id="ID_Category" name="ID_Category" class="w-full border rounded-md px-3 py-2">
                    <?php foreach (getCategories($con) as $category): ?>
                        <option  value="<?php echo $category['ID_Category']; ?>"><?php echo $category['Categoryname']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" name="add_article"  class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
                Add Article   
            </button>
            </div>
        </form>
</body>
</html>
