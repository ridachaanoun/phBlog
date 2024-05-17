<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Update operation
if (isset($_POST['submit'])) {
    // Retrieve form data
    $ID_user = $_POST['ID_user'];
    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $pass_word = $_POST['pass_word'];
    $role_name = $_POST['role_name'];

    // Update user in the database
    $stmt = $con->prepare("UPDATE users SET username = :username, Email = :Email, pass_word = :pass_word, ID_role = :role_name WHERE ID_user = :ID_user");
    $stmt->bindParam(':ID_user', $ID_user);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':pass_word', $pass_word);
    $stmt->bindParam(':role_name', $role_name);

    if ($stmt->execute()) {
        // Redirect back to users.php with success message
        header("Location: users.php?success=update");
        exit(); // Ensure that subsequent code is not executed after redirection
    } else {
        echo "Error updating user.";
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
            title: 'User updated successfully!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
