<?php

if(isset($_FILES['uploadFile']))
{
    $errors = array();
	$data = '';
    $file_name = $_FILES['uploadFile']['name'];
	if($_FILES['uploadFile']['error'] > 0){
	    switch ($_FILES['uploadFile']['error'])
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
	if(file_exists(DirPath . $file_name))
	{
    	$errors[] = 'File with that name already exists.';
	}	     
	if(empty($errors))
	{
		$uploadfile = uploadFile();
		if($uploadfile)
		{
			$data = "The file " . basename($uploadfile) . " has been uploaded";
		} else {
			$errors[] = "Permission denied";
		}
    }
}

if(isset($_POST["fname"]))
{
	$fname = $_POST["fname"];
	$dir = DirPath;
	if(deleteFile($dir, $fname))
	{
		$data = "File deleted";
	} else {
		$errors[] = "You don't have permission to delete this file";
	}
}

function uploadFile() 
{
	if(checkPermission($dir)) 
	{
		if(isset($_FILES['uploadFile'])) 
		{
			$fileName = $_FILES['uploadFile']['name'];    
			if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], DirPath . $fileName)) 
			{
				return $fileName;
			} else {
				return false;
			}
    	}
 	}
}

function deleteFile($dir, $fname)
{
	if(file_exists($fname))
	{
		$filename = $fname;
		if(checkPermission($dir))
		{
			if(checkPermission($filename))
			{
				if(unlink($filename))
				{
					return true;
				} 
				else 
				{
					return false;
				}
			}
		} 
		else 
		{
			return false;
		}
	}
}

function getListOfFile($dir)
{
    $nameOfDir = DirPath;
    return $result = glob($nameOfDir.'*.*');
}

function getSizeOfFile($dir)
{
    $nameOfDir = DirPath;
    $result = glob($nameOfDir.'*.*');
	foreach ($result as $key) 
	{
        $fileSize[] = (filesize($key) . "\n");
    }
  return $fileSize;
}

function sizeConverter($size)
{
    if($size >= 1024 && $size < 1024 * 1024)
    {
        $size = round($size / 1024, 2) . ' KB';
    }
    elseif ($size >= 1024 * 1024)
    {
        $size = round($size / 1024 / 1024, 1) . ' MB';
    }
    else
    {
        $size = $size . ' B';
    }
    return $size;
}


function checkPermission() 
{
	$dirPerm = substr(decoct(fileperms(DirPath)), -3);
	if (intval($dirPerm[2]) < 5) 
	{
		return false;
	} else 
	{
		return true;
	}
}




