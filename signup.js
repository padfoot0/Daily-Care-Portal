function check()
{ 
    var name=document.getElementById("name").value
    var userid=document.getElementById("userid").value
    var email=document.getElementById("email").value
    var password=document.getElementById("password").value
    var phoneno=document.getElementById("phoneno").value
    var radio=document.getElementById("radio")
    var radio1=document.getElementById("radio1")
    var security=document.getElementById("security").value
    
    if(name=="")
    {
        alert("you cannot leave empty name")
        return false;
    }
    
    if(/[0-9@$#&*]+/.test(name))
    {
        alert("name only in alphabetic");
        return false;
    }

    if(userid=="")
    {
        alert("you cannot leave empty userid");
        return false;
    }

    if(!/^[\w0-9_@]{3,15}$/.test(userid))
    {
        alert(" length should be in between 3 to 15");
        return false;
    }
    if(email=="")
    {
        alert("you cannot leave empty email")
        return false;
    }
    if(!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email))
    {
        alert("invalid email type")
        return false
    }
    if(password=="")
    {
        alert("you cannot leave empty password");
        return false;
    }
    
    if(!/^[\w0-9@#$%&?]{6,15}$/.test(password))
    {
        alert("length of password should be 6-15");
        return false;
    }

    if(phoneno=="")
    {
        alert("you cannot leave empty phoneno");
        return false;
    }  
    if(!/[0-9]{10}/.test(phoneno))
    {
        alert("invalid phoneno")
        return false;
    }  

    if ( ( !radio.checked ) && (!radio1.checked ) )
    { 
        alert ( "Please  choose your type:BUYER OR SHOPKEEPER" );
        return false;
    }

    if ( ( radio.checked ) && (radio1.checked ) )
    { 
        alert ( "Please  choose only one:BUYER OR SHOPKEEPER" );
        return false;
    }
    if(security=="")
    {
        alert("please enter security question answer")
        return false;
    }

    if(!/[\w]/.test(security))
    {
        alert("only text allowed")
        return false;
    }
return true;
}

