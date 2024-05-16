<?php
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['articleID'])) {
    $articleID = $_GET['articleID'];
    $stmt = $con->prepare("SELECT * FROM articles WHERE ID_arti = :articleID");
    $stmt->bindParam(':articleID', $articleID);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUsers($con) {
    $stmt = $con->query("SELECT ID_user, username FROM users ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategories($con) {
    $stmt = $con->query("SELECT ID_Category, Categoryname FROM categories");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="../css/ajouter.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
<?php include '../sidebar.php'; ?>
        <?php include '../navbar.php'; ?>
        <div class="container scrollable-container">
    <h2>Edit Article</h2>
    <form method="post" action="update_article.php" class="max-w-md mx-auto" >
        <input type="hidden" name="articleID" value="<?php echo $article['ID_arti']; ?>">
        
      
        <div class="mb-4">
                <label for="titre" class="block font-semibold mb-2">Titre:</label></br>
                <input type="text" id="titre" name="titre" class="w-full border rounded-md px-3 py-2" value="<?php echo $article['Titre']; ?>"><br>
                </div>
                <div class="mb-4">
                <label for="Contenu_arti">Contenu:</label><br>
        <textarea id="Contenu_arti" name="Contenu_arti"><?php echo $article['Contenu_arti']; ?></textarea><br>
                </div>
                <div class="mb-4">
        <label for="subtitle">Sous-titre:</label><br>
        <input type="text" id="subtitle" name="subtitle" value="<?php echo $article['subtitle']; ?>"><br>
                </div>
                <div class="mb-4">
        <label for="Date_created">Date de création:</label><br>
        <input type="date" id="Date_created" name="Date_created" value="<?php echo $article['Date_created']; ?>"><br>
                </div>
                <div class="mb-4">
        <label for="ID_user">Utilisateur:</label><br>
        <select id="ID_user" name="ID_user">
            <?php foreach (getUsers($con) as $user): ?>
                <option value="<?php echo $user['ID_user']; ?>" <?php if($user['ID_user'] == $article['ID_user']) echo 'selected'; ?>><?php echo $user['username']; ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="ID_Category">Catégorie:</label><br>
        <select id="ID_Category" name="ID_Category">
            <?php foreach (getCategories($con) as $category): ?>
                <option value="<?php echo $category['ID_Category']; ?>" <?php if($category['ID_Category'] == $article['ID_Category']) echo 'selected'; ?>><?php echo $category['Categoryname']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <div class="mb-4">
        <button type="submit" name="submit"  class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
        Update Article   
    </button>
        <div class="mb-4">
              </form>
        </div>
</body>
</html>
