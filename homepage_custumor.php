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
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href="css/innerhomepage.css">
<script src="innerhomepage.js"> </script>
</head>
<body>

<IMG  SRC="image/HOME.png" CLASS='head_img'><BR><BR>
<div class='nev_bar_header'>


         <div class="nev_bar_link"> 
             <a class="nev_bar" href="homepage_custumor.php"> home</a>
             <a class="nev_bar" href="">about</a>
             <div class="nev_bar2">welcome : <?php echo $_SESSION['username'];?></div>
             <a class="nev_bar2" href="">profile</a>
             <a class="nev_bar2" href="logout.php">logout</a>
        </div>
</div>

<div class="three_bar" onclick="three_bar(this)">
             <div class="three_bar1"></div>
              <div class="three_bar2"></div>
             <div class="three_bar3"></div>


             <div id="myDropdown" class="dropdown-content">
                        <a href="find_book.php">find book</a>
                        <a href="view_cart.php">view cart</a>
                        <a href="#contact">Contact</a>
             </div>
</div>


</body>
</html>