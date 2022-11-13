<?php
require_once("config/config.php");
if(isUserLoggedIn())
{
	if($_SESSION['user_level']==1)
	{
		header("LOCATION:".$admin_url."site-details");
	} else {
		header("LOCATION:".$admin_url."site-details");
	}
}
else
{
	header("LOCATION:".$admin_url."login");
}
?>