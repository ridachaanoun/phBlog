<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Update operation
if (isset($_POST['submit'])) {
    // Retrieve form data
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];
    $parentID = $_POST['parentID'];

    // Update category in the database
    $stmt = $con->prepare("UPDATE categories SET Categoryname = :categoryName, ID_parent = :parentID WHERE ID_Category = :categoryID");
    $stmt->bindParam(':categoryID', $categoryID);
    $stmt->bindParam(':categoryName', $categoryName);
    $stmt->bindParam(':parentID', $parentID);
    
    if ($stmt->execute()) {
        // Redirect back to categories.php with success message
        header("Location: categories.php?success=update");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        echo "Error updating category.";
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
            title: 'Category updated successfully!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
