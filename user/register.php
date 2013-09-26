<?php

/*

user registeration version 0.1 
Version Name:Kitten (bcoz i love kittens)
now e-mail is sent via smtp 

Logic: Validate data recived and store data to hob_temp_user_table with a unique token , send confirm email to the user containg a link appended with the token

 
*/


//database connection

include ('./../includes/connect.php');

//security module

include('./../includes/security.php');



//creating 
extract($_POST);

if(spamcheck($email))
{
if($username==$password)
{
$salt=get_salt($email);
$username=md5($salt.$username.$salt);



$token=md5((uniqid('a',true).rand()));


$qry="INSERT INTO hob_temp_user(e_mail,first_name,last_name,password,token) Values ('$email','$firstname','$lastname','$username','$token')";

if(!mysql_query($qry))
{
echo 'Unable to Register , mysql:'.mysql_error();

}

else
{
echo 'success';





//send e-mail via smtp
send_reg_email($email,$token,$lastname);

}


}

}




?>
