<!DOCTYPE html>
<html>
<body>

<?php
$indent = $_GET['indent'];
$width =  $_GET['width'];
$boxes =  $_GET['boxes'];
$indexOfHeightChange =  $_GET['indexOfHeightChange'];
$base64 = base64_encode(file_get_contents("http://redsquareagency.com/img/rsa-meta.jpg"));
$howMany =  1;
  
  include 'make.php';

  for ($i = 1; $i <= $howMany; $i++) {
    echo "<div style='float: left;'>".$code."</div>";
  }
?>
</body>
</html>