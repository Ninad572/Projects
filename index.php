<!DOCTYPE html>
<html>
<head>
  <title>Expense Tracker</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
  <div>
  <img src="background.jpg" alt="" style="filter:blur(4px); z-index: index -1;" >
  <div>
    <div>
  <h1 style="margin-left:auto;margin-right:auto;text-align:center;">Expense Tracker</h1>
  <form action="transactions.php" method="post" style="text-align: center; z-index: index 1;">
  <div>
    <label for="transaction_name" style="display:inline-flexbox;font-size:20px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight: bold;">Expense Name-</label>
    <input type="text" id="transaction_name" name="transaction_name" style="margin-bottom: 1rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  border: 1px solid #ccc;
  font-size: 1rem;">
  </div>
    <br><br>
    <div>
    <label for="amount" style="display:inline-flexbox;font-size:20px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight:bold;">Amount-</label>
    <input type="text" id="amount" name="amount" style="margin-bottom: 1rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  border: 1px solid #ccc;
  font-size: 1rem;">
    </div>
    <br><br>
    <div>
    <input type="submit" name="submit" value="Add Transaction" style="background-color: #4CAF50; /* set the background color */
  border: none; /* remove the border */
  color: white; /* set the text color */
  padding: 10px 20px; /* set the padding */
  text-align: center; /* center the text */
  text-decoration: none; /* remove the underline */
  display: inline-block;
  font-size: 16px; /* set the font size */
  cursor: pointer; /* add a cursor pointer */
  border-radius:7px;">
    </div>
  </form>
  </div>
  <br><br>
  </div>
  <table style=" border: 3px solid black;
    border-collapse: collapse;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    width:40%;
    font-size:20px;">
    <tr style="font-size: 20px;font-family:Verdana, Geneva, Tahoma, sans-serif">
      <th>Expense</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "expense";
      
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      $sql = "SELECT * FROM transactions";
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["transaction_name"]. "</td><td>" . $row["amount"]. "</td><td><a href='edit.php?id=" . $row["id"]. "'>Edit</a> | <a href='delete.php?id=" . $row["id"]. "'>Delete</a></td></tr>";
        }
        echo "</table>";
      } else {
        echo "";
      }
      mysqli_close($conn);
    ?>
  </table>
  </div>
</body>
</html>
