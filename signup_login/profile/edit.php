<?php
session_start();
$con = new PDO('mysql:host=localhost;dbname=blog_db', 'root', "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID_user = $_SESSION['ID_user'];
    $username = $_POST['username'];
    $email = $_POST['Email'];
    $password = $_POST['pass_word'];

    $stmt = $con->prepare("UPDATE users SET username = :username, Email = :email, pass_word = :password WHERE ID_user = :ID_user");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':ID_user', $ID_user);

    if ($stmt->execute()) {
        header("Location: show.php?ID_user=" . $ID_user);
        exit;
    } else {
        $error = "Failed to update profile. Please try again.";
    }
} else {
    if (isset($_GET['ID_user'])) {
        $ID_user = $_GET['ID_user'];
        $stmt = $con->prepare("SELECT u.*, r.role_name FROM users u INNER JOIN roles r ON u.ID_role = r.ID_role WHERE ID_user = :ID_user");
        $stmt->bindParam(':ID_user', $ID_user);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Profile</h2>
            <?php if (isset($error)): ?>
                <p class="text-red-500 text-center"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="post" action="" class="space-y-4">
                <input type="hidden" name="ID_user" value="<?php echo $user['ID_user']; ?>">
                <div>
                    <label for="username" class="block font-semibold mb-1">Username:</label>
                    <input type="text" id="username" name="username" class="w-full border rounded-md px-3 py-2" value="<?php echo htmlspecialchars($user['username']); ?>">
                </div>
                <div>
                    <label for="Email" class="block font-semibold mb-1">Email:</label>
                    <input type="text" id="Email" name="Email" class="w-full border rounded-md px-3 py-2" value="<?php echo htmlspecialchars($user['Email']); ?>">
                </div>
                <div>
                    <label for="pass_word" class="block font-semibold mb-1">Password:</label>
                    <input type="text" id="pass_word" name="pass_word" class="w-full border rounded-md px-3 py-2" value="<?php echo htmlspecialchars($user['pass_word']); ?>">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md w-full">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
