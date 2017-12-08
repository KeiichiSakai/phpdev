<?php
$host = "localhost";
$dbname = 'co_354_it_3919_com';
$dsn = 'mysql:dbname=co_354_it_3919_com;host=localhost';
$user = 'co-354.it.3919.c';
$pass = '9Jvuy5Gjs';

try {
$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$stmt = $pdo->query('SHOW TABLES');
    while($re = $stmt->fetch(PDO::FETCH_ASSOC)){
        var_dump($re);    // $re は配列。echo では表示できない
    }
} catch (PDOException $e) {
 var_dump($e);
 exit('データベース接続失敗。'.$e->getMessage());
}
if ($pdo) {
    echo "接続した";
    echo "<br>";
}
/*
$sql = "CREATE TABLE pre_member (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
urltoken VARCHAR(128) NOT NULL,
mail VARCHAR(50) NOT NULL,
date DATETIME NOT NULL,
flag TINYINT(1) NOT NULL DEFAULT 0
)";

/*
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
*/
/*
if ($pdo->query($sql) === TRUE) {
    echo "Table  created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

/*
$sql2 = 'select id, name from users';
$stmt = $pdo->query($sql2);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($result);

/*
$ta = "SHOW TABLES FROM co_354_it_3919_com";

$result = $pdo->query(ta);

foreach((array)$result as $row) {
    print_r($row);
    echo'<br>';
}
/*

$sql1 = "CREATE TABLE IF NOT EXISTS `users`"
."("
. "`id` INT auto_increment primary key,"
. "`name` VARCHAR(255),"
.");";

$stmt = $pdo -> prepare($sql1);
$stmt -> execute();


if ($stmt) {
    echo "テーブルを作成した";
}
*/
?>