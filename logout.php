<?php
if(!isset($_SESSION))
{
		session_start();
}
	unset($_SESSION["admin"]);

	session_destroy();
 header("location:index.php");
 ?>
