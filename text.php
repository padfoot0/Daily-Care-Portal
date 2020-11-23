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
<html>
     <head>
     <link rel='stylesheet' href="test.css">
</head>
    <form ACTION="test_bh.php" METHOD="POST">

            <div id="book_add">

                 <div class="content">

                      <span>BOOKID :</span> <input type="text" class="abc" style="width:100px;" name="bookid[]" id="bi" value="" />
                      <span>COUNT :</span> <input type="text" class="def" style="width:100px;" name="count[]" id="c" value="" />
                 </div> 

             </div><BR>

        <input type="button" id="more_fields" onclick="add();" value="ADD" />  
         <input type="submit" id="submit" name="submit" value="submit">

     </form>
</html>


 <script>
var counter=0;
function add()
       {       
            
          var bi=document.getElementsByClassName("abc")
          var c=document.getElementsByClassName("def")

          if(bi[counter].value==""||c[counter].value=="")
          {
               alert("enter value")
          }
          else
          {
                      var objTo = document.getElementById('book_add')
                      var divtest = document.createElement("div");
                     divtest.innerHTML = '<br><div class="content"><span>BOOKID : <input type="text" style="width:100px;"class="abc" name="bookid[]" value="" /> COUNT : <input type="text" class="def" style="width:100px;" name="count[]" value="" /></span></div>';
    
                   objTo.appendChild(divtest);
                   counter++;

       }

       }
          

     
</script>


