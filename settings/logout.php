<?php
require_once("config/config.php");

 	session_start();
    session_unset();
header("LOCATION:".$admin_url."login");
?>