<?php

$file = "kadai.txt";
$words = "�����̏�������\n";
$fop = fopen($file, "a");
@fwrite( $fop, $words);
fclose($fop);



echo "kadai.txt�ɕ������������񂾁B";
?>