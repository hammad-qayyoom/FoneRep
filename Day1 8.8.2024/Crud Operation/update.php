<?php
include("config/database.php");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE datatable SET username='$username', password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    header("Location: index.php"); // Redirect to the main page after updating
    exit();
}
?>
