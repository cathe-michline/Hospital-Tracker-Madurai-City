<?php

session_start();

if(isset($_SESSION['hname']))
{
	unset($_SESSION['hname']);

}

header("Location: hospital_login_page.php");
die;