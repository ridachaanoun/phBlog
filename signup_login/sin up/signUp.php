<?php
require "../connection.php";

// Check if form is submitted
if(isset($_POST['add'])){ 
    $username = $_POST["username"];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Check if fields are empty
    if(empty($username) || empty($email) || empty($password)){
       // If any field is empty, show an error message
       header("location: sign-up.php?error=You must fill in all fields");
       exit;
    } else {
        // Check if email already exists
        $existing = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $existing->execute([':email' => $email]);

        if($existing->rowCount() > 0){
            // If email already exists in the database, show an error message
            header("location: sign-up.php?error=The email is already registered");
            exit;
        } else {
            // Hash the password
            // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user data into the database
            $insert = $conn->prepare("INSERT INTO users (username, email, pass_word, ID_role) VALUES (:username, :email, :pass, :ID_role)");
            $insert->execute([
                ':username' => $username,
                ':email' => $email,
                ':pass' =>$password,
                ':ID_role' => 2
            ]);
            
            // Redirect to login page after successful registration
            header("Location: ../log in/log-in.php");
            exit; // Terminate further script execution
        }
    }
}
?>
