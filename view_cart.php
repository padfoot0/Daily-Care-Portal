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
$s1="select * from shoping_detail where user_id='$user_id'";
$q1=mysqli_query($conn,$s1);
$book_name=array();
$cost=array();
$count=array();
while($d=mysqli_fetch_assoc($q1))
{
     $book_id=$d['book_id'];
     array_push($count,$d['quantity']);

      $s2="select * from book_info where book_id='$book_id'";
     $q2=mysqli_query($conn,$s2);
      while($d1=mysqli_fetch_assoc($q2))
     {
          array_push($book_name,$d1['title']);

          array_push($cost,$d1['cost']);

          
     }
}
$length=count($book_name);
?>
<html>
<body><table cellspacing=40px align='center'><tr><th>title</th><th>cost</th><th>count</th><th>total</th><th>remove</th></tr>
<tr> 
<td><?php 
for($x=0;$x<$length;$x++)
{
     echo $book_name[$x]."<br>";
}
?> 
</td>
 <td> <?php 
for($x=0;$x<$length;$x++)
{
     echo $cost[$x]."<br>";
}
?> </td> 
 <td align='center'><?php 
for($x=0;$x<$length;$x++)
{
     echo $count[$x]."<br>";
}
?> </td> 
 <td><?php 
for($x=0;$x<$length;$x++)
{
  echo $count[$x]*$cost[$x];
}
?> </td> 

 <td><?php
 echo"<input type='button' value='remove' name='remove'"; ?> </td></tr>
<tr>
<td colspan='2' align='center'><a href='homepage_custumor.php'><input type='button' name=back value='back'></a></td>
<td colspan='2'><a href='#'><input type='button' name=back value='shop now'></a></td>
</tr>
</table></body></html>