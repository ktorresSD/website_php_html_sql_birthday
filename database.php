
<?php
$connect=mysqli_connect('localhost','root','','birthday');

echo 'Connected to SQL database'; 
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}

?>