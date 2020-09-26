<head>
<style>
table
{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th
{
  border: 1px solid #dddddd;
  
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<?php
include "../../dbconfig.php";
$test_ID = $_GET['test_id'];

$sqll = mysqli_query($conn ," SELECT * FROM mcq WHERE t_id ='".$test_ID."'");
//print_r($sqll);
$r=mysqli_num_rows($sqll);
    if($r==false)
    {
        echo "<h3 style='color:Red'>No any records found ! </h3>";
    }
    else
    {
        ?>
            <table>
                <tr>
                    <th>Serial No </th>
                    <th>Question</th>
                    <th>Right Answer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            
            <?php
            while($row=mysqli_fetch_array($sqll))
            {
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['question']?></td>
                    <td><?php echo $row['ans']?></td>
                    <td><a href="updatequestion.php?test_id=<?php echo $row['id']?>"> Edit</a></td>
                    <td><a href="delete_question.php?test_id=<?php echo $row['id']?>"> Delete</a></td>
                    
                </tr>
            
            <?php
            }?>
             <?php
        }  //else smart end
?>
            </table>