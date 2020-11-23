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
$p=$_SESSION["username"];

if(isset($_POST["submit"]))
{
   $shop_name=$_POST["shop_name"];
   $gstid=$_POST["gstid"];
   $type=$_POST["type"];
   $house_no=$_POST["house_no"];
   $locality=$_POST["locality"];
   $place_name=$_POST["place_name"];
   $pincode=$_POST["pincode"]; 
}
$s1="insert into shop_detail values('$p','$shop_name','$gstid','$type','$house_no','$locality','$place_name','$pincode')";
$q1=mysqli_query($conn,$s1);
header("location:homepage_shopkeeper.php");
?>