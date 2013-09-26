<?php

include ('./../includes/connect.php');


$result=mysqli_query($con,'show tables');
echo mysqli_error($con);
?>