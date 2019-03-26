<?
include './function.php';
include './config.php';

uploadFile();
getListOfFile($dir);
getFileSize($dir);
include './templates/index.php';

?>
