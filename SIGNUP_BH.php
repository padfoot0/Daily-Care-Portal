<?php
$host="localhost";
$sqluser="padfoot";
$sqlpass="03051998@Sanu";
$dbname="project";
$conn=mysqli_connect($host,$sqluser,$sqlpass,$dbname);

if(isset($_POST["SUBMIT"]))
{
$name=$_POST["NAME"];
$user_id=$_POST["USERID"];
$email=$_POST["EMAIL"];
$password=password_hash($_POST["PASSWORD"],PASSWORD_ARGON2I);
$phone_no=$_POST["PHONENO"];
$type=$_POST["D"];
$security_que_val=$_POST["sec_ques"];
$answer=$_POST["sec_que_ans"];
}

$s2="select password from signin where user_id='$user_id'";
$q2=mysqli_query($conn,$s2);
$s5="select user_id from signup where phone_no='$phone_no'";
$q5=mysqli_query($conn,$s5);
$s4="select user_id from signup where email='$email'";
$q4=mysqli_query($conn,$s4);

if(mysqli_num_rows($q2)>0) 
{
    echo"username already exist";
}
elseif(mysqli_num_rows($q4)>0)
{
    echo"email already exist";
}
elseif(mysqli_num_rows($q5)>0 )
{
    echo" phoneno already exist";
}

else
{
$s1="insert into signin
values('$user_id','$password')";
$q1=mysqli_query($conn,$s1);

$s3="insert into signup(name,user_id,email,phone_no,type,security_que_val,answer)
 values('$name','$user_id','$email','$phone_no','$type','$security_que_val','$answer')";
$q3=mysqli_query($conn,$s3);
}

?>
