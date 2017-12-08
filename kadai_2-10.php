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


$statement = $pdo->prepare('select * from pre_member');
$statement->execute();
$i = 0;
while ($column = $statement->getColumnMeta($i++)) {
echo $column['name']."<br />";
}

// foreach文で配列の中身を一行ずつ出力
                foreach ($statement as $row) {
            // データベースのフィールド名で出力
                    echo $row['id'].'：'.$row['urltoken'];
                    echo '<br>';
                    echo $row['mail'];
                    echo '<br>';
                    echo $row['date'];
                    echo '<br>';
                    echo $row['flag'];
                    echo '<br>';
                    echo '<br>';
                }


/*
$columns = array();

for ($i = 0; $i < $pdoStatement->columnCount(); $i++) {
    $meta = $pdoStatement->getColumnMeta($i);
    $columns[] = $meta['name'];
}

var_dump($columns);


/*
$sql = "SELECT * FROM users"
 
$result = $pdo -> query($sql);
 
//クエリー失敗
if(!$result) {
	echo $pdo->error;
	exit();
}
//連想配列で取得
while($row = $result->fetch(PDO::FETCH_ASSOC)){
	echo $row["COLUMN_NAME"]."<br />";
}
*/
?>