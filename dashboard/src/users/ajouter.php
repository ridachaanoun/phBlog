<?php
// Database connection
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to get roles for select option
function getRoles($con) {
    $stmt = $con->query("SELECT ID_role, role_name FROM roles");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Create operation
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Do not hash the password
    $role_id = $_POST['role_id'];

    $stmt = $con->prepare("INSERT INTO users (username, email, pass_word, ID_role) VALUES (:username, :email, :password, :role_id)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role_id', $role_id);

    if ($stmt->execute()) {
        header("Location: users.php?success=update");
        exit(); 
    } else {
        echo "Error updating article.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/ajouter.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <?php include '../sidebar.php'; ?>
    <?php include '../navbar.php'; ?>
    <div class="container scrollable-container">
        <h2>Add User</h2>
        <form method="post" class="max-w-md mx-auto" action="">
            <div class="mb-4">
                <label for="username" class="block font-semibold mb-2">Username:</label><br>
                <input type="text" id="username" name="username" class="w-full border rounded-md px-3 py-2">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-2">Email:</label><br>
                <input type="email" id="email" name="email" class="w-full border rounded-md px-3 py-2">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-semibold mb-2">Password:</label><br>
                <input type="password" id="password" name="password" class="w-full border rounded-md px-3 py-2">
            </div>
            <div class="mb-4">
                <label for="role_id" class="block font-semibold mb-2">Role:</label><br>
                <select id="role_id" name="role_id" class="w-full border rounded-md px-3 py-2">
                    <?php foreach (getRoles($con) as $role): ?>
                        <option value="<?php echo $role['ID_role']; ?>"><?php echo $role['role_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit" name="add_user" class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
                    Add User
                </button>
            </div>
        </form>
    </div>
</body>
</html>
