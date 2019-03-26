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
    <table border="1" width="500">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Size</th>
			<th>Delete</th>
		</tr>
		</thead>
		<tbody>
			<?php
				$fileList = getListOfFile(PathDir);
				$fileSize = getFileSize(PathDir);
                var_dump($fileSize);
                var_dump($fileList);
				//die;
				$number = 1;
				if($files){
					foreach($files as $file){
						$fname = $file;
						$i = $number;
						$i--;
					  $fsize = $fileSize[$i];
						$text = "<td>
									<form action=\"\" method=\"post\">
										<input type=\"hidden\" name=\"fname\" value=\"{$fname}\">
										<button type=\"submit\">Delete</button>
									</form>
								 </td>\n";
						echo "<tr align=\"center\">\n";
				    	echo "<td>{$number}</td>\n";
				    	echo "<td>{$fname}</td>\n";
				    	echo "<td>{$fsize}</td>\n";
				    	echo $text;
				    	echo "</tr>\n";
						$number++;
					}
				} else {
					echo "<tr align=\"center\">\n";
					echo "<td colspan=\"4\">Failed opening directory for reading.</td>\n";
					echo "</tr>\n";
				}
			?>
		</tbody>
	</table>
<?php

?>


    </body>
</html>
