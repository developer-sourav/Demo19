<?php
session_start();
ini_set('display_errors',0);

//////VARIABLES
$admin_url="http://localhost/demo19/settings/";
$admin_email='amit@gmail.com';


/////MYSQL CONNECTION
$hostname_offers = "localhost";
$database_offers = "conglome_ptadmin";
$username_offers = "conglome_ptadmin";
$password_offers = "Admin123@#$";

$connect=mysqli_connect("localhost","root","","demo19");

///Function to check if logged in,,, Returns true if logged in
function isUserLoggedIn()
{
	if(isset($_SESSION['user_logged']) && $_SESSION['user_logged']=='yes')
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>