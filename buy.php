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

$user_id=$_SESSION["username"];
echo $user_id;
$shop_id=$_SESSION['shop_id'];
echo $shop_id;
$book_id=$_SESSION['book_id'];
echo "$book_id";
?>