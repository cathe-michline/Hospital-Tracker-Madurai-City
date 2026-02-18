<?php

function check_login($con)
{

	if(isset($_SESSION['hname']))
	{

		$hname = $_SESSION['hname'];
		$query = "select * from hadmin where hname = '$hname' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: hospital_login_page.php");
	die;

}

?>