<?php

include 'connection.php';

if(!isset($_POST["submit"])) //if form not yet submited 
{
	header("location:signin.php");
	exit;
}

if(isset($_POST["submit"]))
{
	$user_id=$_POST["username"];
	$w=$_POST["password"];
}

$s1="select password from signin where user_id='$user_id'"; //finding user
$q1=mysqli_query($conn,$s1);

if(mysqli_num_rows($q1)>0)
{	
	while($d=mysqli_fetch_assoc($q1))

		{

	 		if(password_verify($w,$d["password"])) //password verification

				{	
					$s2="select type from signup where user_id='$user_id'";
					$q2=mysqli_query($conn,$s2);


					if(mysqli_num_rows($q2)>0)
					{
			
						$d1=mysqli_fetch_assoc($q2);
				
							
							if($d1["type"]==1)
							{		
								$_SESSION['password']=$w;	
								$_SESSION['username']=$user_id;
								header('location:homepage_custumor.php');
								exit;
							}
							if($d1["type"]==2)
							{		
								
								$_SESSION['password']=$w;	
								$_SESSION['username']=$user_id;
								header('location:homepage_shopkeeper.php');  
								exit;
							}
					
					}
															
				}
	
			else
				{
					echo"userid or password wrong";
					session_destroy();
				}
	

		}

}
else
echo "there is no such user exist";
?>
