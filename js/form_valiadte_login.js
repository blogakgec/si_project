function valiadte()
{
    document.myform.email.style.background="white";
    if(document.myform.email.value == "")
    {
        document.myform.email.style.background="red";
        return false;
    }
    if(document.myform.pword.value == "")
    {
        document.myform.email.style.background="red";
        return false;
    }
    return true;
}