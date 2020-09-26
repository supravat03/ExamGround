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
if(isset($_POST["save"]))
{
    $s_code=$_POST["s_code"];
    if(sizeof($s_code)===0)
        echo "Please select any subject ";
    elseif(sizeof($s_code)===2)
         echo "Please Select only one subject ";
    else
    {
        if($s_code[0]==="")
            $final=$s_code[1];
        else 
            $final=$s_code[0];

    // mysqli_query($conn,"INSERT INTO test(t_name,subject_code) VALUES ('$_POST[t]','$final' )") or die(mysqli_error($conn));
    

        //$final = "MA518";
        $sql=mysqli_query($conn,"SELECT * FROM test WHERE subject_code ='".$final."'");
        $r=mysqli_num_rows($sql);
        if($r==false)
        {
            echo "<h3 style='color:Red'>No any records found ! </h3>";
        }
        else//else smart
        {
            ?>
            <table>
                <tr>
                    <th>Test Name</th>
                    <th>Subject Code</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            
            <?php
            while($row=mysqli_fetch_array($sql))
            {
                ?>
                <tr>
                    <td><?php echo $row['t_name']?></td>
                    <td><?php echo $row['subject_code']?></td>
                    <td><a href="view_question.php?test_id=<?php echo $row['t_id']?>"> view</a></td>
                    <td><a href="delete_paper.php?test_id=<?php echo $row['t_id']?>"> Delete</a></td>
                </tr>
            
            <?php
            }?>
             <?php
        }  //else smart end
    }
}//main if end(save)
else
{        ?> 
            </table>
    <div>
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered" style="margin-bottom:50px">
                <h1>Tick the subject whose quiz you want to display <h1>
                <?php echo $row['subject1_code'] ?> : <input  type="checkbox" name="s_code[]" value="<?php echo $row['subject1_code'] ?>"/> <br>
                <?php echo $row['subject2_code'] ?> : <input  type="checkbox" name="s_code[]" value="<?php echo $row['subject2_code'] ?>"/> <br>
                <tr>
	            	<Td colspan="2" align="center">
	            	<input type="submit" value="Done" class="btn btn-info" name="save"/>
	            	</td>
	            </tr>
            </table>
        </form>
    </div>
<?php }?>  
 
