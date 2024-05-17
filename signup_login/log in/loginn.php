<?php
require "../../connection.php";

$email = $_POST['email'];
$pass = $_POST['pass'];

session_start();

if(isset($_POST['add'])){

    if($_POST['email'] ==  "" or $_POST['pass'] == ""){
        // if this condition true we stay here and Show message
        header("location: log-in.php.?error=You must fill in the email and pass field");
        exit;
    } else {
        $Existing = $conn->prepare("SELECT * FROM users WHERE email = :email ");
        $Existing->execute([
            ':email'=>$email
        ]);
        $row = $Existing->fetch(PDO::FETCH_ASSOC);

        if($Existing->rowCount() == 0){
            // if this condition true we go to massage.html page 
            header("location: log-in.php.?error=this email is undefined!!!");
            exit;
        } else {

            $hashed_password = $row["pass_word"];

            if($pass == $hashed_password) {
                // Password is correct

            } else {
                // Password is incorrect
                header("location: log-in.php.?error=Password is incorrect!!!");
                exit;
            }
        }     
    }
}
?>
