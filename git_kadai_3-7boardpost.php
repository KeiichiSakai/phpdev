<?php
    session_start();
?>

<?php
if(!isset($_SESSION["current_user"])){
                    $_SESSION["unlogin"] = "投稿するにはログインが必要です";
                    
            }
?>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<h1>投稿しました</h1>
<p>
            <?php
            $host = 'localhost';
            $dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';
            $coment = $_POST["coment"];
            $name = $_SESSION["current_user"];
            $image = file_get_contents($_FILES["image"]["tmp_name"]);
            $type = $_FILES["image"]["type"];
            $filename = $_FILES["image"]["name"];
            try {
            $pdo = new PDO($dsn,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e) {
             var_dump($e);
             exit('データベース接続失敗。'.$e->getMessage());
            }
            if($name and $coment and $_SESSION["current_user"]){
            $stmt = $pdo-> prepare("INSERT INTO board (name, coment, image, type, filename) VALUES (:name, :coment, :image, :type, :filename)");
            $stmt->bindParam(':name',$name, PDO::PARAM_STR);
            $stmt->bindParam(':coment',$coment, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);
            $stmt->execute();
            
            //--------------------------------------------------------パッケージの読み込み
            require_once("../Cache/Lite.php");
            //--------------------------------------------------------初期設定
            $options = array(
                'cacheDir' => '../Cache/',//保存Dir
                'lifeTime' => 30,//time
                'automaticSerialization' => 'true'//配列などの使用
            );
            $cache = new Cache_Lite($options);//コンストラクタ
            $cache_id = "board";
            //--------------------------------------------------------表示整形用
            //echo '<pre>';
            //--------------------------------------------------------実際の処理
            //$cache->remove($cache_id);
            $cache->clean();    
            $_SESSION["msg"] = "投稿成功";
            header('Location: http://co-354.99sv-coco.com/dev/kadai_4board_cache.php');
            //header('Location: http://co-354.99sv-coco.com/dev/kadai_3-7board.php');
            }else{
                $_SESSION["msg"] = "投稿失敗";
                header('Location: http://co-354.99sv-coco.com/dev/kadai_4board_cache.php');
            }
            ?>
</p>
<a href="http://co-354.99sv-coco.com/dev/kadai_3-7board.php">掲示板へ</a>
</html>