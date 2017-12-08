<html>
<head><title>PHP TEST</title></head>
<body>

<?php
$host = "localhost";
$dbname = 'co_354_it_3919_com';
$dsn = 'mysql:dbname=co_354_it_3919_com;host=localhost';
$user = 'co-354.it.3919.c';
$pass = '9Jvuy5Gjs';
//$tablename = 'test3';
try{
    //$dbh = new PDO($dsn, $user, $pass);
    $dbh = mysql_connect($host,$user,$pass) or die("MYSQLへの接続に失敗しました");
    print('<br>');

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    var_dump($e);
    die();
}

echo "接続まで"."<br>";
    
$db_selected = mysql_select_db($dbname, $dbh);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

echo "選択まで"."<br>";
    

/*
$sql1 = "CREATE TABLE `{$tablename}`"
."("
. "`dd` INT auto_increment primary key,"  /////////// ※１
. "`y` INT,"   //////////////※２
. "`m` INT,"
. "`d` INT,"
. "`youbi` INT,"
. "`yokin` INT,"
. "`c1` VARCHAR(20),"
. "`c2` VARCHAR(20),"
. "`c3` VARCHAR(20),"
. "`c4` VARCHAR(20),"
. "`c5` VARCHAR(20),"
. "`i_date` DATETIME"
.");";


$rs = mysql_query($sql1)or die(mysql_error());

echo"テーブル作成まで"."<br>";
*/
    
// テーブル情報取得
/*
$result = mysql_query("SHOW TABLES",$dbh) or die("テーブル取得に失敗しました");

if ($dbh and $result) {
    echo "$result";
    echo "接続してテーブルを取得した。";
    echo '<br>';
    foreach ((array)$result as $row) {
        echo $row[0];
        echo "＜＞";
        echo '<br>';
    }
}
*/
?>
</body>
</html>