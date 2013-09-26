<?php

/*

security module version 0.1

Version Name:Kitten (bcoz i love kittens)

added sanitize function to prevent 18/08/2013

added spamcheck function to prevent email injection 18/08/2013

added send_reg_email function to send e-mail via smtp 27/08/2013

added salt genarator function, random salt prevents rainbow table attack :p 28/08/2013 

added standerdise_email function to sanitize email 31/08/2013

edited spamcheck function 31/08/2013



logic:this module contains too much magic , if you edit it the spell will be broken and i can't fixit xD 
      Merlin Jithin


*/




//function to sanitize value

function sanitize($input){

if(is_array($input)){

foreach($input as $k=>$i){

$output[$k]=sanitize($i);

}

}

else{

if(get_magic_quotes_gpc()){

$input=stripslashes($input);

}

$output=mysql_real_escape_string($input);

}

return $output;

}

//function to prevent e-mail injection

function spamcheck(&$field)
  {

  	//filter_var() sanitizes the e-mail

  	//address using FILTER_SANITIZE_EMAIL

  	$field=filter_var($field, FILTER_SANITIZE_EMAIL);

standerdise_email($field); // will standerdise e_mail

	  //filter_var() validates the e-mail

	  //address using FILTER_VALIDATE_EMAIL


  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {

    return TRUE;

    }

  else
    {

    return FALSE;

    }

  }



//function to send confirmation e-mail via smtp 

function send_reg_email($to_user,$token,$name)
{

 $from = "Registration <no-reply@hobhubs.com>";

 $to = "$name <$to_user>";

 $subject = "Confirmation Required !";




 $body = "Hi $name ,\n\nHow are you?\n\n ".'Please Click on the link to Verify Your E-mail

<a href="http://hobhubs.juplo.com/user/verify_email.php?token='.$token.'" targe="_BLANK">http://hobhubs.com/beta/user/verify_email.php?token='.$token.'</a>';
 
 $host = "smtpout.secureserver­.net";

 $username = "no-reply@hobhubs.com";

 $password = "H0bhubs@";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {

   echo("<p>" . $mail->getMessage() . "</p>");

  }

else {

   echo("<p>A confirmation e-mail is sent , Hurry Check your Inbox !</p>");

  }
}

 

function get_salt($email)
{

/*

Random salt will protect the password from rainbow table attack if the db is hacked

logic:take the first and second letter of the email, then lookup for 8 letter random word associated 

with the first and second letter
 
*/



$first=strtolower($email[0]);
$second=strtolower($email[1]);


$salt=array();


$salt['a']='k!pnk!pn';

$salt['b']='f(dfsh@s';

$salt['c']='vn*df(df';

$salt['d']='k3ravn*d';

$salt['e']='vn*dv1ts';

$salt['f']='c8ghk3ra';

$salt['g']='z2vxc8gh';

$salt['h']='p4oqz2vx';

$salt['i']='l0l0ququ';

$salt['h']='p4oql0qu';

$salt['j']='7w6f7dpw';

$salt['k']='#w6f7dpw';

$salt['l']='rtesa33s';

$salt['m']='k1q0%*&%';

$salt['n']='d%v9zcrt';

$salt['o']='J_e_s_u';

$salt['p']='_Eby____';

$salt['q']=':)er%_:D';

$salt['r']='n%i!v#i)';



$salt['s']='wayne_$*&^';

$salt['t']='blekko_%';

$salt['u']='za:p__xD';

$salt['v']='ou:Dkilo';


$salt['w']='wvYHzerq';

$salt['x']='ClBk089e';

$salt['y']='zcCc}__{';

$salt['z']='XTfz1$%*';


return ($salt["$first"].$salt["$second"]);


}


function standerdise_email(&$email)
{

$e_mail_array=explode('@',$email);

$e_mail_array[0]=str_ireplace('.','',$_email_array[0]);

$email=$e_mail_array[0].'@'.$e_mail_array[1];


}




//sanitizing all data from users

$_POST=sanitize($_POST);

$_GET=sanitize($_GET);

$_COOKIE=sanitize($_COOKIE);

$_SESSION=sanitize($_SESSION);


?>
