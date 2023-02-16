<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "expense";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $transaction_name = $_POST['transaction_name'];
    $amount = $_POST['amount'];
    
    $sql = "UPDATE transactions SET transaction_name='$transaction_name', amount='$amount' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
      header("Location: index.php");
      exit();
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM transactions WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Transaction</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Edit Transaction</h1>
  <form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="transaction_name">Transaction Name:</label>
<input type="text" name="transaction_name" value="<?php echo $row['transaction_name']; ?>">
<label for="amount">Amount:</label>
<input type="text" name="amount" value="<?php echo $row['amount']; ?>">
<input type="submit" name="update" value="Update">
</form>
</body>
</html>
