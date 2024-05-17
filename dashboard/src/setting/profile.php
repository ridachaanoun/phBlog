<?php
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to retrieve users with their roles
function getUsersWithRoles($con)
{
    $stmt = $con->prepare("SELECT u.*, r.role_name FROM users u INNER JOIN roles r ON u.ID_role = r.ID_role");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['ID_user'])) {
    $ID_user = $_GET['ID_user'];
    $stmt = $con->prepare("SELECT u.*, r.role_name FROM users u INNER JOIN roles r ON u.ID_role = r.ID_role WHERE ID_user = :ID_user");
    $stmt->bindParam(':ID_user', $ID_user);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/ajouter.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="profile.css">

</head>
<body>
    <?php include '../sidebar.php'; ?>
    <?php include '../navbar.php'; ?>
    <div class="container scrollable-container">

        <h2>Edit User</h2>
        <form method="post" action="update.php" class="max-w-md mx-auto">
            <input type="hidden" name="ID_user" value="<?php echo $user['ID_user']; ?>">
            <div class="mb-4">
                <label for="username" class="block font-semibold mb-2">Username:</label><br>
                <input type="text" id="username" name="username" class="w-full border rounded-md px-3 py-2" value="<?php echo $user['username']; ?>"><br>
            </div>
            <div class="mb-4">
                <label for="Email">Email:</label><br>
                <input type="text" id="Email" name="Email" value="<?php echo $user['Email']; ?>"><br>
            </div>
            <div class="mb-4">
                <label for="pass_word">Password:</label><br>
                <input type="text" id="pass_word" name="pass_word" value="<?php echo $user['pass_word']; ?>"><br>
            </div>
            <div class="mb-4">
                <label for="role_name">Role:</label><br>
                <select id="role_name" name="role_name">
                    <?php foreach (getUsersWithRoles($con) as $role) : ?>
                        <option value="<?php echo $role['ID_role']; ?>" <?php if ($user['ID_role'] == $role['ID_role']) echo 'selected'; ?>><?php echo $role['role_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer w-full">
                    Update User
                </button>
            </div>
        </form>
    </div>
</body>
</html>
