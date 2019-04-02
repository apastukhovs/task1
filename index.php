<?php
require 'config.php';
require 'function.php';

$listOfFile = getListOfFile(DirPath);
$sizeOfFile = getSizeOfFile(DirPath); 


include 'templates/index.php';

?>
