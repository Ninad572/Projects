<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "expense";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  if(isset($_POST['submit'])) {
    $transaction_name = $_POST['transaction_name'];
    $amount = $_POST['amount'];
    
    $sql = "INSERT INTO transactions (transaction_name, amount) VALUES ('$transaction_name', '$amount')";
    
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  
  mysqli_close($conn);
  header("Location:index.php");
?>
