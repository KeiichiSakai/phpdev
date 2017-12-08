<?php

$host = "localhost";
$dbname = 'co_354_it_3919_com';
$dsn = 'mysql:dbname=co_354_it_3919_com;host=localhost';
$user = 'co-354.it.3919.c';
$pass = '9Jvuy5Gjs';
$table_name = 'users';
try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}

$sql = "DELETE FROM board WHERE id = :id";
$stmt = $pdo->prepare($sql);
//削除するレコードのIDを配列に格納する
$params = array(':id' => '30');

$stmt->execute($params);
echo '削除できました';

?>