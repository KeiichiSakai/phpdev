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

$sql = "SELECT * FROM users ORDER BY id";
 
// SQLステートメントを実行し、結果を変数に格納
$stmt = $pdo->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['id'].'：'.$row['firstname'].'：'.$row['lastname'];
 
  // 改行を入れる
  echo '<br>';
}

/*
$id = 1;
$firstname = "1fname";
$lastname = "1lname";

$stmt = $pdo-> prepare("INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)");
$stmt->bindParam(':firstname',$firstname, PDO::PARAM_STR);
$stmt->bindParam(':lastname',$lastname, PDO::PARAM_STR);
$stmt->execute();
*/
?>
</p> 
</html>