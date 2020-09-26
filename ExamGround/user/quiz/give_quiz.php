<?php 
if(isset($_POST["save"])){
    $s_code=$_POST["s_code"];
    if(sizeof($s_code)===0 || sizeof($s_code)>1){
        echo "Choose one";
    }
    else{
        if($s_code[0]!==""){
            $final=$scode[0];

        }elseif($s_code[1]!==""){
            $final=$scode[1];

        }elseif($s_code[2]!==""){
            $final=$scode[2];
        
        }elseif($s_code[3]!==""){
            $final=$scode[3];
        
        }elseif($s_code[4]!==""){
            $final=$scode[4];
        
        }
        echo $final;

        $t=mysqli_query($conn,"SELECT * FROM test WHERE subject_code='".$final."'");
        while($r=mysqli_fetch_array($t)){
            echo $r['t_id']; 
            
        }
        print_r($t);
          echo $final;
    }
}

$sql=mysqli_query($conn,"SELECT * FROM student WHERE stu_email ='".$_SESSION['user']."'");
$r=mysqli_num_rows($sql);
if($r==false)
{
echo "<h3 style='color:Red'>No any records found ! </h3>";
}
else{
    while($row=mysqli_fetch_array($sql)){
     ?>

<form method="post" enctype="multipart/form-data">
        <table class="table table-bordered" style="margin-bottom:50px">
        <h1>Choose one<h1>
        <?php echo $row['sub1'] ?>: <input  type="checkbox" name="s_code[]" value="<?php echo $row['sub1'] ?>"/> <br>
        <?php echo $row['sub2'] ?>: <input  type="checkbox" name="s_code[]" value="<?php echo $row['sub2'] ?>"/> <br>
        <?php echo $row['sub3'] ?>: <input  type="checkbox" name="s_code[]" value="<?php echo $row['sub3'] ?>"/> <br>
        <?php echo $row['sub4'] ?>: <input  type="checkbox" name="s_code[]" value="<?php echo $row['sub4'] ?>"/> <br>
        <?php echo $row['sub5'] ?>: <input  type="checkbox" name="s_code[]" value="<?php echo $row['sub5'] ?>"/> <br>

                <tr>
					
					<Td colspan="2" align="center">
					<input type="submit" value="Save" class="btn btn-info" name="save"/>
					</td>
				</tr>
                </table>
		</form>
  <?php  }
} ?>  

<body>
</body>