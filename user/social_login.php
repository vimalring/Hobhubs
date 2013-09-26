<?php

/*

social login module
Version Name:Kitten (bcoz i love kittens)
version 0.1 

Logic: When i wrote this,only god and I understood what i was doing
       Now,God only Knows xD
			-Jithin
	
*/

//connects to database
include ('./../includes/connect.php');

//security module
include('./../includes/security.php');


//social connection modules
include('./../includes/social.php');

print_r($_REQUEST);

$social=strtolower($_GET['s']);

switch($social)
{
case fb:
connect_fb();
break;

case tw:
connect_twitter();
break;

case gl:
connect_google();
break;

}






?>
