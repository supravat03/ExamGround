<?php 
require('dbconfig.php');
//extract($_POST);
if(isset($_POST['save']))
{
	if ( strlen($_POST['e']) < 1 || strlen($_POST['p']) < 1) {
		$err="<font color='red'>Missing data</font>";
		goto end;
	}

	if ( strpos($_POST['e'],'@') === false ) {
		$err="<font color='red'>Please enter a valid email address</font>";
		goto end;
	}

	if( strlen($_POST['p']) < 6){
		$err="<font color='red'>Password must be atleast 6 characters</font>";
		goto end;
	}
	else
	{
		$stmt = $conn->prepare("SELECT * FROM prof WHERE email= ?");
		$stmt->bind_param("s", $_POST['e']);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if(password_verify($_POST['p'], $row["pass"])){
					$_SESSION['faculty_login']=$_POST['e'];
					header('location:faculty');
				}
				else{
					$err="<font color='red'>Incorrect password.</font>";
				}
			}
		}
		else{
			$err="<font color='red'>User not registered</font>";
		}
	}
}
?>
<?php end: ?>
<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">

<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>Faculty Login Form</h2></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Email</div>
		<div class="col-sm-5">
		<input type="email" name="e" class="form-control"/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Password</div>
		<div class="col-sm-5">
		<input type="password" name="p" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-info"/>
		
		</div>
	</div>
</form>	
</div>
</div>