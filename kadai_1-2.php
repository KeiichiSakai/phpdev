<?php

$file = "kadai.txt";
$words = "•¶Žš‚Ì‘‚«‚±‚Ý\n";
$fop = fopen($file, "a");
@fwrite( $fop, $words);
fclose($fop);



echo "kadai.txt‚É•¶Žš‚ð‘‚«ž‚ñ‚¾B";
?>