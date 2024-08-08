<?php
include("config/database.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM datatable WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    header("Location: index.php"); // Redirect to the main page after deletion
    exit();
}
?>
