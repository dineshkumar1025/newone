<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['newtask'])) {
    $newtask = $_POST['newtask'];

    
    $sql = "INSERT INTO grocery_items (newtask) VALUES ('$newtask')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM grocery_items WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$conn->close();
?>

