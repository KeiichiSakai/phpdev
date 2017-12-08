
<?php
$host = "localhost";
$dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';

try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$sql = 'ALTER TABLE board DROP reg_date';
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
echo "テーブルを削除しました。";
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}
?>