<?php 
$q=mysqli_query($conn,"select * from prof where email='".$_SESSION['email']."'");
$r=mysqli_num_rows($q);
if($r!=false)
{
echo "<h3 style='color:Red'>No any records found ! </h3>";
}
else
{

    // *************************************************
    $sql = mysqli_query($conn, "SELECT * FROM prof WHERE email ='" . $_SESSION['faculty_login'] . "'");
    $r = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);



    // ******************************************************





    $subject1 = $row['subject1_code'];
    $subject2 = $row['subject2_code'];
    
?>
<body>
    <p><?php echo $subject1 ?><br></p>
    <p><?php echo $subject2 ?></p>
    
    <h1></h1>
    
<?php } ?>
        
</body>