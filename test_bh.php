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
if(isset($_POST["submit"]))
{

    $bi=$_POST["bookid"];
    $c=$_POST["count"];

}
$user=$_SESSION['username'];
$s1="select shop_id from shop_detail where user_id='$user'";
$q1=mysqli_query($conn,$s1);
if(mysqli_num_rows($q1)>0)
{	
	while($d=mysqli_fetch_assoc($q1))

		{
            $shop_id=$d['shop_id'];
        }
    }
            $j=0;
         for($i=0;$i<sizeof($bi);$i++)
           {   
            for(;$j<sizeof($c);$j++)
            {   
                $book=$bi[$i];
                $count=$c[$j];
                $s2="insert into book_shop values('$shop_id','$book','$count')";
                $q2=mysqli_query($conn,$s2);
                break;
            } 
            $j++;
        }

        header('location:homepage_shopkeeper.php'); 


?>