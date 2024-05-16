<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Update operation
if (isset($_POST['submit'])) {
    // Retrieve form data
    $articleID = $_POST['articleID'];
    $titre = $_POST['titre'];
    $Contenu_arti = $_POST['Contenu_arti'];
    $subtitle = $_POST['subtitle'];
    $Date_created = $_POST['Date_created'];
    $ID_user = $_POST['ID_user'];
    $ID_Category = $_POST['ID_Category'];
    
    // Update article in the database
    $stmt = $con->prepare("UPDATE articles SET Titre = :titre, Contenu_arti = :Contenu_arti, subtitle = :subtitle, Date_created = :Date_created, ID_user = :ID_user, ID_Category = :ID_Category WHERE ID_arti = :articleID");
    $stmt->bindParam(':articleID', $articleID);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':Contenu_arti', $Contenu_arti);
    $stmt->bindParam(':subtitle', $subtitle);
    $stmt->bindParam(':Date_created', $Date_created);
    $stmt->bindParam(':ID_user', $ID_user);
    $stmt->bindParam(':ID_Category', $ID_Category);
    
    if ($stmt->execute()) {
        // Redirect back to articles.php with success message
        header("Location: articles.php?success=update");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        echo "Error updating article.";
    }
}
?>

<!-- Include SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Check if a success message is set in the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success');
    if (successMessage === 'update') {
        Swal.fire({
            icon: 'success',
            title: 'Article updated successfully!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
