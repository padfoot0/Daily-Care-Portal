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

$s2="select * from user_address where user_id='$user_id'";
$q2=mysqli_query($conn,$s2);

if(mysqli_num_rows($q2)==0)
{
    header("location:user_address.php");
}
else
{   
    echo "<html>
    <body>
    <form action='' method='POST'>
    <table align='center'>
    <tr>
    <td>
    book name : <input type='text' name='book'>
    <input type='submit' name='submit' value='submit'>
    <p>*write the proper and full name of the book </p>
    </td>
    </tr>
    </table>
    </form>
    </body>
    </html>";

    while($pin=mysqli_fetch_assoc($q2))
    {
        $user_pincode=$pin["pincode"];
    }
 if(isset($_POST["submit"]))
 {
     $book_name=strtolower($_POST["book"]);
         $s1="select * from book_info where title='$book_name'";
         $q1=mysqli_query($conn,$s1);
         
             if(mysqli_num_rows($q1)>0)

                {
                    while($d=mysqli_fetch_assoc($q1))
                    {
                       $book_id=$d["book_id"];
                       $title=$d["title"];
                       $writter=$d["writter"];
                       $cost=$d["cost"];
                       
                    }
                     $s3="select * from book_shop where book_id='$book_id'";
                     $q3=mysqli_query($conn,$s3);
                     if(mysqli_num_rows($q3)>0)
                     {
                        while($d1=mysqli_fetch_assoc($q3))
                        {
                            $shop_id=$d1["shop_id"];
                            $s4="select *from shop_detail where shop_id='$shop_id'";
                            $q4=mysqli_query($conn,$s4);
                            while($d2=mysqli_fetch_assoc($q4))
                            {
                                $shop_pincode=$d2['pincode'];

                                if($shop_pincode-$user_pincode>=-1 && $shop_pincode-$user_pincode<=1)
                                {
                                    $shop_name=$d2['shop_name'];
                                    $house_no=$d2['house_no'];
                                    $locality=$d2['locality'];
                                    
                                    echo "<br><table align='center'><tr><td>ADDRESS:-</td></tr></table>";
                                    echo "<br><table align='center'><tr><td>".$shop_name."</td></tr></table>";
                                    echo "<table align='center'><tr><td>".$house_no."</td></tr></table>";
                                    echo "<table align='center'><tr><td>near ".$locality."</td></tr></table>";
                                    echo "<table align='center'><tr><td> ".$shop_pincode."</td></tr></table>";


                                    echo "<br><table align='center'><tr><td>BOOK DETAIL:-</td></tr></table>";
                                    echo "<br><table align='center'><tr><td>".$title."</td></tr></table>";
                                    echo "<table align='center'><tr><td>".$writter."</td></tr></table>";
                                    echo "<table align='center'><tr><td> ".$cost."</td></tr></table>";

                                    $_SESSION['shop_id']=$shop_id;
                                    $_SESSION['book_id']=$book_id;

                                    echo "<br><center><form action='buy_items.php' method='POST'>QUANTITY :-
                                    <input type='number' style='width:50px;' name='quantity1'>
                                    <input type='submit' name='submit' value='add to cart'><br>
                                    <p>
                                    <a href='view_cart.php'><input type='button' name='view cart' value='view cart'></a></p>
                                    </form></center>";

                                }
                                else
                                {
                                    echo "not in range";
                                }

                            }
                        }

                     }
                     else
                     {
                         echo "<br><table align='center'><tr><td>book is not in shop</td></tr></table>";
                     }
                }
            else
               {
                  echo"<br><table align='center'><tr><td>there is no such book exist</td></tr></table>";
               }
    }
echo "
    <table align='center'>
    <tr>
    <td>
    <a href='homepage_custumor.php'><input type='button' name='back' value='back'></a>
    </td>
    </tr>
    </table>
  ";

}

?>
