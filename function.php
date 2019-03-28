<?
function uploadFile($dir) {
if(isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];    
    if (move_uploaded_file($_FILES['file']['tmp_name'], DirPath . $fileName)) {
        return $fileName;
    } else {
        return false;
    }
}


}


function getListOfFile($dir)
{
    $nameOfDir = "files/";
    return $result = glob($nameOfDir.'*.*');
}

function removeFile($dir, $fileName)
{
    if($dir && file_exists($fileName))
    {
        unlink($fileName);
        return true;
    }
    else {
        return false;
    }
}

function getSizeOfFile($dir)
{
    $nameOfDir = "files/";
    $result = glob($nameOfDir.'*.*');

    foreach ($result as $key) {
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

/*function getPerms($fileName)
{
    if(0777 === fileperms($fileName))
    {
    return true;
  }
    else
  {
    return false;
  }
}*/

?>
