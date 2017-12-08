<?php
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];

$ans1 = $num1 + $num2;
$str1 = $num1.$num2;


if($num1 == 0||$num2 == 0){
    print("$str1");
    $push1 = $str1."\n";
}
else{
    print($num1." + ".$num2." = ".$ans1);
    $push1 = $num1." + ".$num2." = ".$ans1."\n";
}

$num3 = $_POST["num3"];
$num4 = $_POST["num4"];

$ans2 = $num3 + $num4;
$str2 = $num3.$num4;


if($num3 == 0||$num4 == 0){
    print("$str2");
    $push2 = $str2."\n";
}
else{
    print($num3." + ".$num4." = ".$ans2);
    $push2 = $num3." + ".$num4." = ".$ans2."\n";
}
    
$file = "kadai.txt";
$fop = fopen($file,"a");
if(!$push1){
@fwrite($fop, $push2);
}
else{
@fwrite($fop, $push1);
}
fclose($fop);
?>