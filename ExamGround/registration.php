<?php 
require('dbconfig.php');
if(isset($_POST['save']))
{

	if( (strlen($_POST['p']) < 6)){
		$err="<font color='red'><h3 align='center'>Password must be atleast 6 characters<h3></font>";
		goto end;
	}

	$a = trim(stripslashes(htmlspecialchars($_POST['n'])));
    if (!preg_match("/^[a-zA-Z-' ]*$/",$a)) {
		$err="<font color='red'><h3 align='center'>Only letters and white space allowed<h3></font>";
		goto end;
      }

    $b = trim(stripslashes(htmlspecialchars($_POST['mob'])));
    if (!preg_match("/^[0-9 ]*$/",$b)) {
		$err="<font color='red'><h3 align='center'>Only digits allowed<h3></font>";
		goto end;
	  }
	
	  $query = "SELECT phone FROM student WHERE phone = ?";
	  $s = $conn->prepare($query);
	  $s->bind_param("i", $_POST['mob']);
	  $s->execute();
	  $r = $s->get_result();
	  
	  if($r->num_rows >0)
	  {
		  $err= "<font color='red'><h3 align='center'>This phone no. already exists</h3></font>";
		  goto end;
	  }
	
    $c = trim(stripslashes(htmlspecialchars($_POST['e'])));

	$subject=$_POST["subject"];
	if(sizeof(array_unique($subject)) !== sizeof($subject)){
		$err="<font color='red'><h3 align='center'>All subjects should be unique<h3></font>";
		goto end;
	}

    $sql_select = "SELECT stu_email FROM student WHERE stu_email = ?";
	$select_stmt = $conn->prepare($sql_select);
	$select_stmt->bind_param("s", $_POST['e']);
	$select_stmt->execute();
	$result = $select_stmt->get_result();
	
	if($result->num_rows >0)
	{
		$err= "<font color='red'><h3 align='center'>This user already exists</h3></font>";
	}
	else{
    $new_password = password_hash($_POST['p'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO student(stu_name,stu_email, pass, phone,sub1,sub2,sub3,sub4,sub5)
              VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssisssss", $a,$c,$new_password,$b,$subject[0],$subject[1],$subject[2],$subject[3],$subject[4]);
    
    $stmt->execute();
    $err="<font color='blue'><h3 align='center'>Registration successfull !!<h3></font>";
	}
}
?>

<?php end: ?>
		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered" style="margin-bottom:50px">
	<caption><h2 align="center">Registration Form</h2></caption>
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Enter Your name</td>
					<Td><input  type="text" name="n" class="form-control" required/></td>
				</tr>
				<tr>
					<td>Enter Your email </td>
					<Td><input type="email" name="e" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Password </td>
					<Td><input type="password" name="p" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Enter Your Mobile </td>
					<Td><input type="text" name="mob" class="form-control" required/></td>
				</tr>
				
				<tr>
					<td>Select Your 1st Subject </td>
					<Td><select name="subject[]" class="form-control" required>
					
					<option>MA543</option>
					<option>MA512</option>
					<option>MA518</option>
					<option>MA567</option>
					<option>MA417</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Select Your 2nd Subject </td>
					<Td><select name="subject[]" class="form-control" required>
					
					<option>MA543</option>
					<option>MA512</option>
					<option>MA518</option>
					<option>MA567</option>
					<option>MA417</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Select Your 3rd Subject </td>
					<Td><select name="subject[]" class="form-control" required>
					
					<option>MA543</option>
					<option>MA512</option>
					<option>MA518</option>
					<option>MA567</option>
					<option>MA417</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Select Your 4th Subject </td>
					<Td><select name="subject[]" class="form-control" required>
					
					<option>MA543</option>
					<option>MA512</option>
					<option>MA518</option>
					<option>MA567</option>
					<option>MA417</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Select Your 5th Subject </td>
					<Td><select name="subject[]" class="form-control" required>
					
					<option>MA543</option>
					<option>MA512</option>
					<option>MA518</option>
					<option>MA567</option>
					<option>MA417</option>
					</select>
					</td>
				</tr>
				
				<tr>
					
					<Td colspan="2" align="center">
					<input type="submit" value="Save" class="btn btn-info" name="save"/>
					<input type="reset" value="Reset" class="btn btn-info"/>
					</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="col-sm-2"></div>
		</div>
	</body>
</html>