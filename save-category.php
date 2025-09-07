<?php

if(isset($_POST['save-category']))
{
	include_once('connection.php');
	session_start();
	$name = $status = $image="";
	$errors=array();
	$name=test_input($_POST['name']);
	$status=test_input($_POST['status']);
	$parent_id=test_input($_POST['parent_id']);
	$image_name=$_FILES["image"]["name"];
	$image=NULL;

	if($image_name && !$parent_id)
	{
		$extension = substr($image_name,strlen($image_name)-4,strlen($image_name));
		if(!in_array($extension,[".jpg","jpeg",".png",".gif"]))
		{
			$errors['image']='Only .jpeg, .png, .gif, .jpg.';
		}
		else
		{
			$image='image'.time().$extension;
			move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/categories/".$image);
		}
	}



	if(is_null($name))
	{
		$errors['name']='Name is required.';
	}

	$query="SELECT *from categories where name='".$name."';";
	$result=$conn->query($query);


	if($result->num_rows>0)
	{
		$errors['name']='Name already exists';
	}

	if(is_null($status))
	{
		$errors['status']='Status is required.';
	}


	if(count($errors))
	{
		$_SESSION['errors']=$errors;
		header('Location: add-category.php');
	}
	else
	{
		$stmt = $conn->prepare("INSERT INTO categories(name,name_alias,status,parent_id,image) VALUES(?,?,?,?,?)");
		$stmt->bind_param("ssiss", $name,$name,$status,$parent_id,$image);
		$result=$stmt->execute();
		$stmt->close();
		$conn->close();
		if($result)
		{
			$_SESSION['success']="Category added successfully.";
		}
		else
		{
			$_SESSION['error']="Something went wrong.";
		}
		header('Location: categories-list.php');
	}
}
else
{
	header('Location: admin-dashboard.php');
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>