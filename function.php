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

function getListOfFile($dir) {
	return $result = glob(DirPath.'*.*');
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

function getFileSize($dir) {
	$result = glob(DirPath.'*.*');

	foreach ($result as $key) {
		$fileSize[] = (filesize($key) . "\n");
	}
  return $fileSize;
}

?>
