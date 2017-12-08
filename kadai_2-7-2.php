<?php
$host = "localhost";
$dbname = 'co_354_it_3919_com';
$dsn = 'mysql:dbname=co_354_it_3919_com;host=localhost';
$user = 'co-354.it.3919.c';
$pass = '9Jvuy5Gjs';
$tbl_name = "tbl_テスト";
// MYSQL接続
$db = mysql_connect($host,$user,$pass) or die("MYSQLへの接続に失敗しました");
// DB選択
mysql_select_db($dbname,$db) or die("DB選択に失敗しました");
//db作成
$str_sql = "CREATE TABLE {$tbl_name}"
    . "("
    . "商品コード CHAR(4),"
    . "商品名 CHAR(16),"
    . "単価 INTEGER,"
    . "PRIMARY KEY(商品コード)"
    . ");";
// SQL文の実行
mysql_query($str_sql,$db);



// テーブル情報取得
$result=mysql_query("SHOW TABLES",$db) or die("テーブル取得に失敗しました");

if ($db and $result) {
    echo "接続してテーブルを取得した。";
    echo '<br>';
    foreach ((array)$result as $row) {
        echo $row[0];
        echo "＜＞";
        echo '<br>';
    }
}

mysql_close($db);
// テーブル名チェック
//while($row=mysql_fetch_assoc($result)) {
//if($row["Tables_in_".$dbname]==$tbname) exit($tbname."は存在します");
//}
// テーブル作成
//$sql="create table ".$tbname." (ID INT, NAME CHAR(32))";
//mysql_query($sql,$db) or die("テーブル作成に失敗しました");
//print($tbname."を作成しました")
    
?>