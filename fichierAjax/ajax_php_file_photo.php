<?php if(!isset($_SESSION)) session_start();

if(isset($_FILES["file"]["type"]))
{
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if(isset($_SESSION['id_user']))    // test du type de session (user ou employe) afin de définir un nom de fichier ex : 12user.jpg (12==identifiant)
	{
		$temporary[0]=$_SESSION['id_user']."user";
	}
	else
	{
		$temporary[0]=$_SESSION['id_employe']."employe";
	}
	
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 2000000)//Approx. 2Mb files can be uploaded.
	&& in_array($file_extension, $validextensions)) 
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}
		else
		{
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = $_SERVER["DOCUMENT_ROOT"]."/photos_user/".$temporary[0].".jpg"; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";			
		}
	}
	else
	{
		echo "<span id='invalid'>***Invalid file Size or Type***<span>";
	}
}
?>