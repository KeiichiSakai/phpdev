<html>
<head><title>PHP TEST</title></head>
<body>

<?php
$dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';

try{
    
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
    
?>
</body>
</html>