<?php
require "../connection.php";

$email = $_POST['email'];
$pass = $_POST['pass'];


if(isset($_POST['add'])){

    if($_POST['email'] ==  "" or $_POST['pass'] == ""){
            // if this condition true we stay here and Show message
            header("location: log-in.php.?error=You must fill in the email and pass field");
            exit;
    }else{
        $Existing = $conn-> prepare("SELECT * FROM users WHERE email = :email ");
        $Existing->execute([
            ':email'=>$email
        ]);
        $row = $Existing ->FETCH(PDO::FETCH_ASSOC);

        if($Existing->rowCount() == 0){
            // if this condition true we go to massage.html page 
            header("location: log-in.php.?error=this email is undefined!!!");
            
            exit;
        }else{

            echo "Hashed Password from Database:". $row["pass_word"];
            echo "<br> Entered Password: ". $pass;
            echo"<br>";
            echo $email;
            $hashed_password = $row["pass_word"];

            if($pass == $hashed_password) {
                // Password is correct
                echo "Password is correct";
                header("location: ../Blog-Post.html");
            } else {
                // Password is incorrect
                echo " <br> Wrong Password";
            }
            exit;
        }     
}
}
?>