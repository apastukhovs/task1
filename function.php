<?
function uploadFile () {
if(isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
 
    echo 'File: ' . $fileName . '<br>';
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], DirPath . $fileName)) {
        echo 'Download was succesful.<br>';
    } else {
        echo 'Cant download!<br>';
    }
}
}

<<<<<<< HEAD
function getListOfFile($dir) {
	return $result = glob(DirPath.'*.*');
=======
function getListOfFile($dir)
{
	$dirName = "files/";
	return $result = glob($dirName.'*.*');
>>>>>>> 0a848ba3dafae0e0b1e79a263bb566d0b7797882
}

function removeFile($dir, $fname) {
	if($dir && $fname)
	{
		unlink($fname);
		return true;
	}
	else {
		return false;
	}
}

<<<<<<< HEAD
function getFileSize($dir) {
	$result = glob(DirPath.'*.*');
=======
function getFileSize($dir)
{
	$dirName = "files/";
	$result = glob($dirName.'*.*');
>>>>>>> 0a848ba3dafae0e0b1e79a263bb566d0b7797882

	foreach ($result as $key) {
		$fileSize[] = (filesize($key) . "\n");
	}
  return $fileSize;
}

?>
