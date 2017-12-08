<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<p>
<?php

$host = "localhost";
$dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';

try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}

$firstname = "テスト";
$lastname = "なまえ";

$stmt = $pdo-> prepare("INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)");
$stmt->bindParam(':firstname',$firstname, PDO::PARAM_STR);
$stmt->bindParam(':lastname',$lastname, PDO::PARAM_STR);
$stmt->execute();
echo "データを保存しました。"
?>
</p>
</html>