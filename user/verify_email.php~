<?php



/*

user Verified scipt version 0.1 
Version Name:Kitten (bcoz i love kittens)

Logic: extract token from URI and lookup in the hob_temp_user_table if found move data to hob_user_table


*/


//database connection

include ('./../includes/connect.php');

//security module
include('./../includes/security.php');



$token=$_GET['token'];


$sql="SELECT * FROM hob_temp_user WHERE token='$token'";


$result=mysql_query($sql);

if(!$result)
{

die('Database Error')

}

else if(mysql_num_rows($result)=0)
{

echo 'Sorry Mate , We are Unable to verify the E-mail or E-mail already Registered';
die();

}


//copy sql data
$user_data=mysql_fetch_array($result);

//extracting data 
extract($user_data);

//query
$sql="INSERT into hob_users(e_mail,first_name,last_name,password,country,gender,dob) VALUES('$e_mail','$first_name','$last_name','$password','$country','$gender','$dob') ";

//little bit error checking
if(!mysql_query($sql))
{
//let the user see something dirty if an error occured :p
echo 'UnKnown error'; 

}

else
{

echo 'confirmed';

//have to redirect to UI page when the redirect is ready 

}
