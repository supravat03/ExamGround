<?php 
session_start();
include('../../dbconfig.php');
error_reporting(1);

$user= $_SESSION['user'];

if($user=="")
{header('location:../../index.php');}
echo $user;
$sql=mysqli_query($conn,"SELECT * FROM student WHERE stu_email='".$_SESSION['user']."'");
$r=mysqli_num_rows($sql);
//if(!($r))echo "We did'nt get the mail";
$row=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   
    <title>Quiz part</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../js/ie-emulation-modes-warning.js"></script>
</head>
<body>
   
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#428bca">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFFFFF" href="#">Hello <?php echo $row['stu_name'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="../index.php"  style="color:#FFFFFF">Home</a></li>
            <li><a href="../logout.php"  style="color:#FFFFFF">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
			
            <li><a href="#"><img style="border-radius:50px" src="../../images/person.jpg" width="100" height="100" alt="not found"/></a></li>

			
			<li><a href="index.php?quiz_part=give_quiz"><span class="glyphicon glyphicon-user"></span> Give Quiz</a></li>
            <li><a href="index.php?quiz_part=result"><span class="glyphicon glyphicon-asterisk"></span>Result</a></li>
			 
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$quiz_part=  $_GET['quiz_part'];
		  if($quiz_part!="")
		  {
		  	if($quiz_part=="give_quiz")
			{
                
				include('give_quiz.php');
			
			}
			
				if($quiz_part=="result")
			{
				include('result.php');
			
			}
		  }
		  else
		  {
		  
		  ?>
		 
		  <h1>Here is your Dashboard</h1>
		  
		  
		  
		  
		  
		  
		  
		  
		  

         
<?php } ?>
        
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>