<?php
require 'config.php';
require 'function.php';

if(isset($_FILES['file'])){
    $errors = array();
	$message = '';
    $file_name = $_FILES['file']['name'];
	if($_FILES['file']['error'] > 0){
	    switch ($_FILES['file']['error'])
		{
      		case 1: $errors[] = ERR_INI_SIZE;  break;
      		case 2: $errors[] = ERR_FORM_SIZE;  break;
      		case 3: $errors[] = ERR_PARTIAL;  break;
      		case 4: $errors[] = ERR_NO_FILE;  break;
      		case 6: $errors[] = ERR_NO_TMP_DIR;  break;
			default:
            	$errors[] = 'Unknown errors.';
    	}
	}
	if(file_exists(DirPath . $file_name)){
    	$errors[] = 'File with that name already exists.';
	}
    if(empty($errors)){
    	$uploadfile = uploadFile(DirPath);
		if($uploadfile){
			//chmod($uploadfile, 0777);
			$message = "The file " . basename($uploadfile) . " has been uploaded";
		} else {
			$errors[] = "Permission denied";
		}
    }
}


if(isset($_POST["fname"])){
	$fname = $_POST["fname"];
	$dir = DirPath;
	if(removeFile($dir, $fname)){
		$message = "File deleted";
	} else {
		$errors[] = "You don't have permission to delete this file";
	}
}


include 'templates/index.php';

?>
