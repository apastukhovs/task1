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

function get_filesize($file)
{
    if(!file_exists($file)) return "Файл  не найден";

  $filesize = filesize($file);

if($filesize > 1024){
$filesize = ($filesize/1024);
    if($filesize > 1024){
    $filesize = ($filesize/1024);
        if($filesize > 1024) {
        $filesize = ($filesize/1024);
        $filesize = round($filesize, 1);
        return $filesize." ГБ";       
        } else {
        $filesize = round($filesize, 1);
        return $filesize." MБ";   
        }       
    } else {
    $filesize = round($filesize, 1);
    return $filesize." Кб";   
    }  
    } else {
    $filesize = round($filesize, 1);
    return $filesize." байт";   
    }
}


?>
