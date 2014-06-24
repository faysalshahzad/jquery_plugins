<?php
    
    require_once 'settings.php';
    
	$num1 = $_GET['first'];
   	$num2 = $_GET['second'];
   
   	$remainder=1;
   
   while(1) {
	    $remainder = $num2 % $num1;
		if($remainder==0) break;
	    $num2 = $num1;
		$num1 = $remainder;
   } 
   
   echo "GCD is $num1";
?>