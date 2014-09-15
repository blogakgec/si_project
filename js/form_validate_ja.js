function validate()
{
    document.myform.email.style.background="white";
   if( document.myform.name.value == "" )
   {
    document.myform.name.style.background="#FF3300";
     document.myform.name.focus() ;
       document.getElementById("errortext").innerHTML="please enter your username";
     return false;
   }
    document.myform.email.style.background="white";
   if( document.myform.email.value == "" )
   {
     document.myform.email.style.background="#FF3300";
     document.myform.email.focus() ;
       document.getElementById("errortext").innerHTML="please enter your email id";
     return false;
   }
    document.myform.email.style.background="white";
   if( document.myform.pword.value == "" )
   {
     document.myform.pword.style.background="#FF3300";
       document.myform.name.focus() ;
       document.getElementById("errortext").innerHTML="please choose a password";
       
    
     return false;
   }
   return( true );
}