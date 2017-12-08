<?php
$host = "localhost";
$dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';

try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$sql = 'ALTER TABLE kadai36 ADD flag TINYINT DEFAULT 1';
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
echo "テーブルを追加しました。";
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}
?>