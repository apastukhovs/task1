<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hello world!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
      if($errors){
    foreach($errors as $error){
    echo "<div class=\"errors\">
            <p>{$error}</p>
        </div>";
  
    }
  } elseif($message){
    echo "<div class=\"success\">
          <p>{$message}</p>
        </div>"; 
  } 
  ?>
<hr>
    <h2>Upload File</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="fileSelect">Filename:</label>
    <input type="file" name="uploadFile" id="fileSelect">
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
    <br>
    <input type="submit" value="Upload">
    </form>
    <table class="tableTmp" border="7" width="777">
  <thead>
  <tr>
    <th>#</th>
    <th>Namee</th>
    <th>Size</th>
    <th>Delete</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $listOfFile = getListOfFile(DirPath);
    $sizeOfFile = getSizeOfFile(DirPath); 
    $id = 1;
    if($listOfFile)
    {
      foreach($listOfFile as $file)
      {
        $fileName = $file;
        $fileSize = sizeConverter($sizeOfFile[$id -1]);
        $event =
        "<td>
          <form action=\"\" method=\"post\">
          <input type=\"hidden\" name=\"fname\" value=\"{$fileName}\">
          <button class=\"del-button\" type=\"submit\">Delete</button>
          </form>
        </td>\n";
        echo "<tr align=\"center\">\n";
        echo "<td>{$id}</td>\n";
        echo "<td>{$fileName}</td>\n";
        echo "<td>{$fileSize}</td>\n";
        echo $event;
        echo "</tr>\n";
        $id += 1;
      }
    
    }
    else
    {
      echo "<tr align=\"center\">\n";
      echo "<td colspan=\"4\">You can't get list of files.</td>\n";
      echo "</tr>\n";
    }
  ?>
  
  </tbody>
</table>
</body>
</html>
