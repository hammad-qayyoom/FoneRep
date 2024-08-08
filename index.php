<?php
include("config/database.php");

// Fetch data from the database
$sql = "SELECT * FROM datatable";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="insert.php" method="post">
<div>
    <label for="uname"></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"></label>
    <input type="password" placeholder="Enter password" name="password" required>  

    <button type="submit" name="submit">Sign up</button>
</div>
</form>

<div>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>
                            <a href='index.php?edit=" . $row['id'] . "'>Edit</a> | 
                            <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM datatable WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>
    <?php
}
?>

</body>
</html>
