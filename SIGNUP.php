<!DOCTYPE HTML>
<HTML>

<HEAD>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href="css/style_signup.css">
<script src="signup.js"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</HEAD>

<BODY>

      <IMG  SRC="image/HOME.png" CLASS='head_img'><BR><BR>
      <a href="index.html"><button class="btn"><i class="fa fa-home"></i></button></a>

<div class = 'table'>

            <FORM ACTION='SIGNUP_BH.php' METHOD='POST' onsubmit='return check()'>


            <INPUT TYPE='TEXT' ID='name' CLASS='input' NAME='NAME' PLACEHOLDER='Name' /></br>
            <INPUT TYPE='TEXT' id='userid' CLASS='input' NAME='USERID' PLACEHOLDER='Username' /><br>

            <INPUT TYPE='EMAIL' id='email'CLASS='input' NAME='EMAIL' PLACEHOLDER='Email' /></br>
            <INPUT TYPE='TEXT' id='phoneno' CLASS='input' NAME='PHONENO' PLACEHOLDER='PhoneNo' /><br>

      <INPUT TYPE='PASSWORD' id='password' CLASS='input' NAME='PASSWORD' PLACEHOLDER='Password' /></br>

      

      <P CLASS='paragraph'>
            <INPUT TYPE='CHECKBOX' id="radio" NAME='D' VALUE='1'>BUYER OR

            <INPUT TYPE='CHECKBOX' id="radio1" NAME='D' VALUE='2'>SHOPKEEPER<BR>

<select name='sec_ques' class='input'>
<option value='1'>your childhood schoolname</option>
<option value='2'>your favorite color</option>
<option value='3'>your favorite food</option>
<option value='4'>your favorite number</option>
</select></br>

<input type='password' id='security' class='input' PLACEHOLDER='Answer' name='sec_que_ans' /><br>


<INPUT TYPE='SUBMIT' NAME='SUBMIT' CLASS='input1' VALUE='Sign Up' /><BR>

<P CLASS='paragraph'> ALREADY HAVE AN ACCOUNT ? <A HREF='signin.php'>SIGN IN</A></P>

</FORM>
</div>



</BODY>

</HTML>
