<?php
$connection = mysqli_connect('localhost','root','','practice');
if(mysqli_connect_errno())
{
	echo"failed to connect" . mysqli_connect_error();
}

?>