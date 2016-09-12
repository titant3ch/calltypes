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

// Setting TimeZone
date_default_timezone_set('America/Chicago');

$time = date("M-j-ga");

// Setting up file
$fh = fopen('../log/Agent/Agent_' . $time . '.csv', 'w');

// Establishing database connection
$con = mysql_connect("127.0.0.1","root","Fedex123");
mysql_select_db("sparkle", $con);

$result = mysql_query("SELECT Agent, Host, CallTime, LOB, Type, Message FROM `calltypes` ORDER BY calltime * 1 DESC"); 

$txt = "Agent, Computer Name, Duration of Call, LOB, Type, Message,\r\n";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, ",");
    }                                                                 
    fwrite($fh, "\r\n");
}

// END

fclose($fh);
mysql_close();
?>

</body>
</html>