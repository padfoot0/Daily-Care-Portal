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
<!DOCTYPE HTML>
<HTML>
<BODY>
<HEAD>
<link rel='stylesheet' href="">

</HEAD>
	
		<TABLE ALIGN='CENTER'>
		
			<TR>
				<TD ALIGN='CENTER'COLSPAN='3'>
					<H1>SHOP DETAILS</H1>
					</TD>
					</TR>
					<FORM  ACTION='shop_detail_php.php' METHOD='POST'>
<TR>
<TD COLSPAN='3' ALIGN='CENTER'>					
<P>SHOP NAME : &nbsp<INPUT TYPE='TEXT'  NAME='shop_name' PLACEHOLDER='AMAN GENERAL STORE' /></P>
<P>SHOP ID :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <INPUT TYPE='TEXT' NAME='gstid' PLACEHOLDER='GST NO' /></P>
<p>TYPE : <select name="type">
	<option value="1">BOOKS</option>
	<option value="2">MEDICINE</option>
</select></p>
<P>HOUSE NO : &nbsp&nbsp&nbsp&nbsp<INPUT TYPE='TEXT'  NAME="house_no" PLACEHOLDER='A-10' /></P>
<P>LOCALITY :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<INPUT TYPE='TEXT'  NAME='locality' PLACEHOLDER='PLACE NEAR YOU' /></P>
<P>PLACE NAME :&nbsp <INPUT TYPE='TEXT'  NAME='place_name' PLACEHOLDER='sector-62' /></P>
<p>PINCODE :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="pincode" placeholder="201301"/>
</TD>
</TR>

<TR>
<TD ALIGN='CENTER' COLSPAN='3' >
<INPUT TYPE='SUBMIT' NAME='submit' VALUE='SUBMIT' /><BR><BR>
</TD>
</TR>

</FORM>
</TABLE>

</BODY>
</HTML>
