<?

function uploadFile () {
if(isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
 
    echo 'File: ' . $fileName . '<br>';

    $uploadDir = '/files/';
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], DirPath . $fileName)) {
        echo 'Download was succesful.<br>';
    } else {
        echo 'Cant download!<br>';
    }
}
}
?>
