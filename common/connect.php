<?php 


$conn = mysqli_connect('localhost' , 'root' , '' , 'hr');

if ($conn) {
	//echo "connected";
}
else{
	die('Failed'.mysqli_error());
}

?>