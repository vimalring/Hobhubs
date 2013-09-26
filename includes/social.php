<?php


function connect_fb()
{
include('./../includes/fb/fbconfig.php');


if($user)

{

 echo $fbuname;
 echo $fbid;
 echo $fbuname;
 echo $fbfullname;
}

else
{

header("location:$loginUrl");

}


}


function connect_twitter()
{



}


function connect_google()
{



}


?>
