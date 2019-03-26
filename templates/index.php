<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hello world!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/style.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    </head>
    <body>
    <h2>Upload File</h2>
    <form enctype="multipart/form-data" method="post">
        File: <input type="file" name="file">
    <input type="submit" name="submintbut" value="Sent file">
    </form>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Size</th>
                <th>DeleteFile</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $arr = getFileInfo(DirPath);
                $countFile = 0;
                foreach($arr as $item) {
                    $countFile++;
                }
            ?>   
            <tr>
                <th><?= $countFile ?></th>
                <td><?= $item['name']?></td>
                <td><?= $item['size']?></td>  
                <td>Delete</td>
            </tr>
            
    </table>

<?php






?>


    </body>
</html>
