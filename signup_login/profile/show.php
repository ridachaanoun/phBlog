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
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/sing-up.css">
    <link rel="stylesheet" href="../../blog/css/home.css">
    <link rel="stylesheet" href="../../blog/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
   
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">User Profile</h2>
            <div class="space-y-4">
                <div>
                    <label for="username" class="block font-semibold mb-1">Username:</label>
                    <span><?php echo $user['username']; ?></span>
                </div>
                <div>
                    <label for="Email" class="block font-semibold mb-1">Email:</label>
                    <span><?php echo $user['Email']; ?></span>
                </div>
                <div>
                    <label for="pass_word" class="block font-semibold mb-1">Password:</label>
                    <span><?php echo $user['pass_word']; ?></span>
                </div>
                <div>
                    <a href="edit.php?ID_user=<?php echo $user['ID_user']; ?>" class="bg-blue-500 text-white py-2 px-4 rounded-md inline-block">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
