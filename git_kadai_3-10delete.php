<html>
    
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>課題３－１０ 投稿削除</title>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
<?php

$host = "localhost";
$dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';
$table_name = 'users';
try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}

$delete_id = $_POST['delete'];
$current_user = $_SESSION["current_user"];
$sql = "DELETE FROM board WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $delete_id, PDO::PARAM_INT);
$stmt->execute();

$_SESSION["msg"] = "投稿を削除しました";
header('Location: http://co-354.99sv-coco.com/dev/kadai_3-10user.php');
echo '削除できました';

?>
<a class="navbar-brand" href="http://co-354.99sv-coco.com/dev/kadai_3-6home.php">掲示板ホーム</a>
    </body>
</html>