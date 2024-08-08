<?php
include("config/database.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO datatable (username, password) VALUES('$username','$password')";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "User has been created";
    } else {
        echo "Something went wrong, Please try again. Error: " . $conn->error;
    }

    header("Location: index.php"); // Redirect to the main page after insertion
    exit();
}
?>
