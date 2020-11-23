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


if(isset($_POST['submit']))
{
    $quantity1=$_POST['quantity1'];
}
$book_id=$_SESSION['book_id'];
$shop_id=$_SESSION['shop_id'];

$s1="select count from book_shop where book_id='$book_id' and shop_id='$shop_id'";
$q1=mysqli_query($conn,$s1);

$d=mysqli_fetch_assoc($q1);
    $count=$d['count'];

$s2="select quantity from shoping_detail where shop_id='$shop_id' and book_id='$book_id'and user_id='$user_id'";
$q2=mysqli_query($conn,$s2);
while($d1=mysqli_fetch_assoc($q2))
{
$val=$d1['quantity'];
}
$quantity2=$quantity1+$val;

if($count>=$quantity2)
{

    $s4="select quantity from shoping_detail where user_id='$user_id' and shop_id='$shop_id' and book_id='$book_id'";
    $q4=mysqli_query($conn,$s4);
    $d3=mysqli_fetch_assoc($q4);
    $quantity3=$d3['quantity'];

     if($quantity3!=null)
    {
       $quantity3=$quantity3+$quantity1;

        $s5="update shoping_detail set quantity='$quantity3' where 
        user_id='$user_id' and shop_id='$shop_id' and book_id='$book_id'";
        $q5=mysqli_query($conn,$s5);

    }
   else {
       $s3="insert into shoping_detail values('$user_id','$shop_id','$book_id','$quantity1')";
       $q3=mysqli_query($conn,$s3);
   }

  header("location:find_book.php");


}
else {
    echo "<center><p>quantity is exceeded</p>
    <a href='find_book.php'><input type='button' value='back'></a></center>";

}


?>