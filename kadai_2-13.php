<?php

$host = "localhost";
$dbname = 'co_354_it_3919_com';
$dsn = 'mysql:dbname=co_354_it_3919_com;host=localhost;charset=utf8;';
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

$sql = "UPDATE users SET firstname = :firstname WHERE id = :id";
$stmt = $pdo->prepare($sql);
// 更新する値と該当のIDを配列に格納する
$params = array(':firstname' => 'test', ':id' => '3');

$stmt->execute($params);
echo '更新できました';

?>