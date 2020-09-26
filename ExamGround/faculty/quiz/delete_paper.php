<?php
$test_ID = $_GET['test_id'];
include "../../dbconfig.php";
$sql = " DELETE FROM test WHERE t_id = '$test_ID'";
   
   if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
      echo "<h3>head back to QUIZ section ?</h3>";?>
      <a href="index.php" >Click Here</a>
      <?php echo "<h3>To Logout</h3>";?>
      <a href="../logout.php" >Click Here</a>
      
   <?php 
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
//mysqli_query($conn,"DELETE from test WHERE t_id = '".$test_ID."' ")or die( "nahi hua");
?>