<?php
$fop = fopen("kadai.txt","r");

if($fop){
	while(!feof($fop)){
		$row = fgets($fop);
		$array[] = $row;
	}
}
print_r($array);
print("<br />");

print("kadai.txtを配列にする");
fclose($fop);
?>