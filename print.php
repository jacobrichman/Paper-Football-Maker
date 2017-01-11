<?php
  $indent = $_POST['indent'];
  $width =  $_POST['width'];
  $boxes =  $_POST['boxes'];
  $indexOfHeightChange =  $_POST['indexOfHeightChange'];
  $howMany = $_POST['copies'];

  if($indent && $width && $boxes && $indexOfHeightChange && $howMany){

    if($_FILES["fileImage"]["tmp_name"]){
      $base64 = base64_encode(file_get_contents($_FILES["fileImage"]["tmp_name"]));
    }
    else{
      $base64="";
    }
    
    include 'make.php';
    
    echo '<!DOCTYPE html> <html> <body onload="window.print()">';

    for ($i = 1; $i <= $howMany; $i++) {
      echo "<div style='float: left;'>".$code."</div>";
    }
    
    echo '</body></html>';
  }
  else{
    header( 'Location: ./' ) ;
  }
  
?>