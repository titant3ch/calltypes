<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>FXRS Call Types | History</title>
  <link rel="stylesheet" type="text/css" href="../css/fonts.css" media="all" />
  <link rel="stylesheet" type="text/css" href="../css/view.css" media="all" />
  <link rel="icon" type="image/gif" href="../img/fx-favicon.ico">

  <meta http-equiv="refresh" content="300" >

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

	<h1>History</h1>

	<a href="http://ausrcwa230/calltypes/view.php"><img src="../img/back.png"></a>

	<div id="log">
		<ul>
			<?php

				if ($handle = opendir('.')) {

					while (false !== ($file = readdir($handle))) {

						if ($file != "." && $file != ".." && $file != "index.php") {

						  $info = pathinfo($file);
						  $file_name =  basename($file,'.'.$info['extension']);

						  echo "<li><a href=http://ausrcwa230/calltypes/log/" . $file_name . ".txt>" . $file_name . "</a></li>";
						}
					}
				}

			closedir($handle);

			?>
		</ul>
	</div>

</body>
</html>