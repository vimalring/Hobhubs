<?php

session_start();

/*

Native user login version 0.1 
Version Name:Kitten (bcoz i love kittens)

Logic:
 
*/


//database connection

include ('./../includes/connect.php');

//security module

include('./../includes/security.php');



//if everything is okay , the code will continue to excute else it will die

if(!isset($_POST['l_firstname'])||$_POST['l_firstname']==''||$_POST['l_password'])||$_POST['l_password']=='')
{

die('email or password missing');

}




/*hu hu if interpreter is here that means there is value in $_POST['l_firstname'] and $_POST['l_password'] */

$email=$_POST['l_firstname'];



//if email is not valid we will stop excuting the script,else we will continue


 if(!spamcheck($email))
{

die('Invalid email');

}


/* interpreter we met again, lets continue our mission of loging the user */


//get salt of the email and lets hash it

$password=$_POST['l_password'];


$salt=get_salt($email);

$password=md5($salt.$username.$salt);



$sql="SELECT user_id FROM hob_user WHERE email='$email' AND password='$password' LIMIT 1";

$result=mysql_query($sql);

if(!$result)
{

die('connection error please try again');

}

if(mysql_num_rows($result)==1)
{

$row=mysql_fetch_array($result);

$_SESSION['user_id']=$row['user_id'];


header("locatoin:./../user/profile.php");

}

else
{

echo 'Wrong username or password';

}




