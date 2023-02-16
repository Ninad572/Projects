<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "expense";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $id = $_GET['id'];
  
  $sql = "DELETE FROM transactions WHERE id=$id";
  
  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  header("Location:index.php");
?>
