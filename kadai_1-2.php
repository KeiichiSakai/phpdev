<?php

$file = "kadai.txt";
$words = "文字の書きこみ\n";
$fop = fopen($file, "a");
@fwrite( $fop, $words);
fclose($fop);



echo "kadai.txtに文字を書き込んだ。";
?>