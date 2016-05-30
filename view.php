<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <title>FXRS Call Types : View</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/gif" href="img/fx-favicon.ico">

  <!-- Meta Data -->
  <meta http-equiv="refresh" content="180" >
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/view.css" media="all" />
  
  <!-- JS -->
  <script src="js/modernizr-custom.js"></script>
</head>

<body>

  <?php
    // Setting TimeZone
    date_default_timezone_set('America/Chicago');

    // Agent Data
    require "inc/agent.php";
  ?>

  
  <!-- navigation -->
  <nav class="pages-nav">
    <div class="pages-nav__item"><a class="link link--page" href="#page-home">CallTypes</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/inc/file.php">Create File</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/inc/AgentFile.php">Agent Report</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/log/calltype/<?php echo date("M-j-ga"); ?>.txt" download>Download</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/inc/cleanload.php">Clear Database</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/inc/toggleOn.php">Broadcast On</a></div>
    <div class="pages-nav__item"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/calltypes/inc/toggleOff.php">Broadcast Off</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-history">History</a></div>
  </nav>

  <div class="pages-stack">

    <div class="page" id="page-home">

        <?php

          $con = mysql_connect("127.0.0.1", "root", "Fedex123");

          if (!$con) {
            $noDatabase = true;
            die('Could not connect: ' . mysql_error());
          }

          $noDatabase = !mysql_select_db("sparkle", $con);

          $query = "SELECT * FROM CallTypes ORDER BY calltime * 1 DESC";
          $result = mysql_query($query);

          if($result === FALSE) {
            // die('<nav>test</nav>');
              
          }

          echo '<h3>Reported Call Types</h3>';

          echo '<table>
                    <tr>
                      <th>LOB</th>
                      <th>Type</th>
                      <th>Time</th>
                      <th>Call Type</th>
                      <th>Agent</th>
                    </tr>';

          while($row = mysql_fetch_array($result)){ 
            echo '
                  
                    <tr>
                      <td>' . $row['LOB'] . '</td>
                      <td>' . $row['Type'] . '</td>
                      <td>' . $row['CallTime'] . '</td>
                      <td>' . $row['Message'] . '</td>
                      <td>' . $agentName[$row['Agent']] . '</td>
                    </tr>
              ';
          }

          echo '</table>';

          $result = mysql_query("SELECT * FROM calltypes", $con);
          $num_rows = mysql_num_rows($result);

          echo "<h4>Total Calls: " . $num_rows . "</h4>";

          mysql_close();

        ?>

    </div>

    <div class="page" id="page-history">
      <h3>Coming Soon</h3>
    </div>

  </div>

  <button class="menu-button"><span>Menu</span></button>

  <script src="js/classie.js"></script>
  <script src="js/main.js"></script>

</body>
</html>