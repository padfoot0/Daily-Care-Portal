<?php
$host="localhost";
$sqluser="padfoot";
$sqlpass="03051998@Sanu";
$dbname="project";
$conn=mysqli_connect($host,$sqluser,$sqlpass,$dbname);

if(empty($_SESSION)) //if the session not yet started
{
     session_start();
     if(!isset($_SESSION['username']))
     header("location:signin.php");
}
else if(!isset($_SESSION['username']))
{
header("location:signin.php");
exit;
}
$username=$_SESSION['username'];
$s1="select * from signup where user_id='$username'";
$q1=mysqli_query($conn,$s1);
while($d=mysqli_fetch_array($q1))
{
    $name=$d['name'];
    $email=$d['email'];
    $phone_no=$d['phone_no'];
}

?>
<!DOCTYPE html>
<html>
<link rel='stylesheet' href="profile.css">
<head>

</head>
<body>
<table align='center'>
<tr>
<td>
<div>NAME : <?php echo $name ?></div><br>
<div>USER ID : <?php echo $username ?></div><br>
<div>EMAIL : <?php echo $email ?></div><br>
<div>PHONE NO : <?php echo $phone_no ?></div><br>
<hr>
</td>
</tr>

</table>

<?php
$s2="select * from shop_detail where user_id='$username'";
$q2=mysqli_query($conn,$s2);
if(mysqli_num_rows($q2)>0)
{
    while($d2=mysqli_fetch_array($q2))
    {
        echo "<p>SHOP NAME : ".$d2['shop_name']."</p>";
        echo "<p>SHOP ID : ".$d2['shop_id']."</p>";
        echo "<p>HOUSE NO : ".$d2['house_no']."</p>";
        echo "<p>LOCALITY : ".$d2['locality']."</p>";
        echo "<p>PLACE NAME : ".$d2['place_name']."</p>";
        echo "<p>PINCODE : ".$d2['pincode']."</p>";
    }
}
?>
<table align="center">
<tr>
<td align='center'> 
<a href="homepage_shopkeeper.php"> <input type='button'value="back"></a>
</td>
</td>
</table>
</body>
</html>