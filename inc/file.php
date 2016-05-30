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
$fh = fopen('../log/calltype/' . $time . '.txt', 'w');

// Establishing database connection
$con = mysql_connect("127.0.0.1","root","Fedex123");
mysql_select_db("sparkle", $con);

$result = mysql_query("SELECT Message FROM CallTypes WHERE LOB = 'fxrs' AND Type = 'FSMS'"); 

$txt = "Here is what the agents are reporting: " . date('g:00 A') . " FXRS " . date('n/j/Y') . "\r\n\r\n";
fwrite($fh, $txt);

$txt = "FXRS: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT Message FROM CallTypes WHERE Type = 'WIS' AND LOB = 'FXRS'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "Web Services: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT Message FROM CallTypes WHERE LOB = 'Café' AND Type = 'Café'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "Café: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT Message FROM CallTypes WHERE Type = 'FXCT' AND LOB = 'FXRS'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "FXCT: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT Message FROM CallTypes WHERE Type = 'Misdirect'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "MISDIRECTS: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT LOB, Message, CallTime FROM `calltypes` ORDER BY calltime * 1 DESC Limit 3"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "AHT Drivers: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " ");
    }                                                                 
    fwrite($fh, " / ");
}

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "------------";
fwrite($fh, $txt);

$result = mysql_query("SELECT Message FROM CallTypes WHERE Type = 'Café' AND LOB = 'FXRS'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "Cafe on FXRS: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

$result = mysql_query("SELECT Message FROM CallTypes WHERE Type = 'FSMS' AND LOB = 'Café'"); 

$txt = "\r\n\r\n";
fwrite($fh, $txt);

$txt = "FXRS on Cafe: ";
fwrite($fh, $txt);

while ($row = mysql_fetch_array($result)) {          
    $last = end($row);          
    $num = mysql_num_fields($result);
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, " - ");
    }                                                                 
    fwrite($fh, " / ");
}

// END

fclose($fh);
mysql_close();
?>

</body>
</html>