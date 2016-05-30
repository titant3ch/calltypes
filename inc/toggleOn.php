<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="refresh" content="0;url=http://ausrcwa230/calltypes/view.php">
  <title>Call Types</title>
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="all" />
</head>

<body>

<?php

// Turning off Error reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Setting up file
$fh = fopen('../.htaccess', 'w');

$txt = 'DirectoryIndex index.php
 # Allow acces without using .php
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]

 # ALLOW USER BY IP
<Files "view.php">
require all denied
#Christian
require ip 192.168.88.122
#Suat
require ip 192.168.88.80
#Janna
#require ip 192.168.88.70
#Jeff
require ip 192.168.89.86
#Charles
require ip 192.168.89.211
</Files>';
fwrite($fh, $txt);


?>

</body>
</html>