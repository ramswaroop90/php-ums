<?php
if(isset($_POST['login']))
{
	include_once('connection.php');
	session_start();
	$request=(object) $_POST;

	$query="SELECT *from users where email='".$request->email."' and password='".$request->password."' LIMIT 1;";
	$result=$conn->query($query);
	if($result->num_rows>0)
	{
		$user=$result->fetch_object();
		if($user->status)
		{
			$_SESSION['auth_user']=$user;
			header('Location: dashboard.php');
		}
		else
		{
			$_SESSION['login_error']='Sorry! Your account is blocked. Please contact to your admin.';
			header('Location: index.php');
		}
	}
	else
	{
		$_SESSION['login_error']='Sorry! Invalid credentials.';
		header('Location: index.php');
	}
}
else
{
	header('Location: index.php');
}

?>