<?php
// $indent = 10;
// $width = 150;
// $boxes = 5;
// $indexOfHeightChange = 5;
// $imageURL = "https://pbs.twimg.com/profile_images/582370417798709248/6PCkRWqh.png";
// $howMany = 1;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$height = $indent;
for ($i = 1; $i <= $boxes; $i++) {
  $num = ($height + ($width + ($indexOfHeightChange * ($i-1))));
  $height = $num;
}

$code .= '
<svg width="'.(($indent + $width)*1.1).'" height="'.$height*1.1.'" style="stroke:black;stroke-width:1">
  <line x1="'.$indent.'" y1="'.$indent.'" x2="'.$indent.'" y2="'.$height.'"  />
  <line x1="'.($indent + $width).'" y1="'.$indent.'" x2="'.($indent + $width).'" y2="'.$height.'"  />
  <line x1="'.$indent.'" y1="'.$indent.'" x2="'.($indent + $width).'" y2="'.$indent.'" />
  <line x1="'.$indent.'" y1="'.($indent + $width).'" x2="'.($indent + $width).'" y2="'.($indent + $width).'"  />
  ';
$lastHeight = $indent;
for ($i = 1; $i <= $boxes; $i++) {
  $num = ($lastHeight + ($width + ($indexOfHeightChange * ($i-1))));
  $code .= '<line x1="'.$indent.'" y1="'.$num.'" x2="'.($indent + $width).'" y2="'.$num.'"  />';
  $lastHeight = $num;
}

$lastHeight = $indent;
for ($i = 1; $i <= $boxes; $i++) {
  $num = ($lastHeight + ($width + ($indexOfHeightChange * ($i-1))));
  if($i % 2 == 0){
    $code .= '<line x1="'.$indent.'" y1="'.$lastHeight.'" x2="'.($indent + $width).'" y2="'.$num.'"  />';
    $code .= '<text x="'.($indent + ($width*.3)).'" y="'.((($num - $lastHeight)*.7)+$lastHeight).'" font-size="'.($width/5).'">'.((($i*2)+1)-1).'</text>';
    $code .= '<text x="'.($indent + ($width*.7)).'" y="'.((($num - $lastHeight)*.3)+$lastHeight).'" font-size="'.($width/5).'">'.(($i*2)-1).'</text>';
  }
  else{
    $code .= '<line x1="'.($indent + $width).'" y1="'.$lastHeight.'" x2="'.$indent.'" y2="'.$num.'"  />';
    $code .= '<text x="'.($indent + ($width*.3)).'" y="'.((($num - $lastHeight)*.3)+$lastHeight).'" font-size="'.($width/5).'">'.(($i*2)-1).'</text>';
    $code .= '<text x="'.($indent + ($width*.7)).'" y="'.((($num - $lastHeight)*.7)+$lastHeight).'" font-size="'.($width/5).'">'.((($i*2)+1)-1).'</text>';
  }
    
  $imageHeight = $num - $lastHeight;
  $lastHeight = $num;
}

$imageDimensions = round(sqrt(pow($imageHeight, 2) + pow($width, 2)));
$secondToLastLine = -(($width+($indexOfHeightChange*($boxes-1)))-$height);

$extension = (($height - $secondToLastLine) * .25)+$height;

$code .= '
  <defs>
      <pattern id="sideOne" x="0" y="0" width="1" height="1">
        <image transform="rotate(-'.rad2deg(atan(($height - $secondToLastLine)/$width)).' 10 '.($indent + $width).')" width="'.$imageDimensions.'" height="'.$imageDimensions.'" xlink:href="data:image/png;base64,'.$base64.'"/>
      </pattern>
  </defs>
  <polygon fill="url(#sideOne)" points="'.($indent + $width).','.$secondToLastLine.' '.$indent.','.$height.' '.$indent.','.$secondToLastLine.'" stroke-width="0" />
  
  <defs>
      <pattern id="sideTwo" x="0" y="0" width="1" height="1">
        <image  transform="rotate('.(180-rad2deg(atan(($height - $secondToLastLine)/$width))).' '.($imageDimensions/2).' '.($imageDimensions/2).')"width="'.$imageDimensions.'" height="'.$imageDimensions.'" xlink:href="data:image/png;base64,'.$base64.'"/>
      </pattern>
  </defs>
  <polygon fill="url(#sideTwo)" points="'.($indent + $width).','.$secondToLastLine.' '.$indent.','.$height.' '.($indent + $width).','.$height.'" stroke-width="0" />
  
  <polygon points="'.$indent.','.$height.' '.($indent + $width).','.$height.' '.($indent + ($width*.85)).','.$extension.' '.($indent + ($width*.6)).','.$extension.' " style="fill:grey;" />
    
</svg>
';