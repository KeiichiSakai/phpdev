<?php
    session_start();
?>


<html>
    
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>ユーザーページ</title>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
        <!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
        <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--button~はウインドウのサイズが780px以下になった時に表示されます。-->
        <a class="navbar-brand" href="http://co-354.99sv-coco.com/dev/kadai_3-6home.php">掲示板ホーム</a>
        <!--こちらにサイト名を入れます。-->
        </div>
        <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <li><a href="http://co-354.99sv-coco.com/dev/kadai_3-9pre.php">会員登録</a></li>
        <li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7login.php">ログイン</a></li>
        <li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7board.php">掲示板</a></li>
        </ul>
        <div class="dropdown navbar-right" style="margin:10px;">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php
                        if(isset($_SESSION["current_user"])){
                            print ($_SESSION["current_user"]);
                        }else{
                            print ("ゲストユーザー");
                        }
                    ?>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php
                        if(isset($_SESSION["current_user"])){
                            print ('<li><a href="http://co-354.99sv-coco.com/dev/kadai_3-10user.php">ユーザページ</a></li>');
                            print ('<li role="separator" class="divider"></li>');
                            print ('<li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7logout.php">ログアウト</a></li>');
                        }else{
                            print ('<li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7login.php">ログインしてください</a></li>');
                        }
                    ?>
                  </ul>
        </div>
        </div>
        <!--/.nav-collapse -->
        </div>
        </div>
        <br>
        <p>    <?php
                    if($_SESSION["msg"] == !null){
                            echo ($_SESSION["msg"]);
                            $_SESSION["msg"] = null;
                        }
                ?>
        </p>
        <br>
        <div class="col-md-offset-3">
        <h1>ユーザーページ</h1>
            <br>
            <br>
            <?php
                $host = 'localhost';
                $dbname = 'ｄｂ';
$dsn = 'データベース名';
$user = 'ユーザー名';
$pass = 'パスワード';
                $current_user = $_SESSION["current_user"];
                try {
                $pdo = new PDO($dsn,$user,$pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                } catch (PDOException $e) {
                 var_dump($e);
                 exit('データベース接続失敗。'.$e->getMessage());
                }
                
                $sql = "SELECT * FROM board WHERE name=(:current_user) ORDER BY id";
                // SQLステートメントを実行し、結果を変数に格納
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':current_user', $current_user, PDO::PARAM_STR);
                    $stmt->execute();
                // foreach文で配列の中身を一行ずつ出力
                    foreach ($stmt as $row) {
                // データベースのフィールド名で出力
                        echo $row['id'].'：'.$row['name'];
                        echo '<br>';
                        echo $row['coment'];
                        echo '<br>';
                        if($row['image'] == !null){
                            $ext = substr($row['filename'], strrpos($row['filename'], '.') + 1);
                            if(strcmp("$ext", "gif") == 0){
                                print '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" "width="320" height="240">';
                                echo '<br>';
                                echo '<br>';
                                echo $row['filename'];
                                echo "image";
                            }
                            elseif(strcmp("$ext", "jpeg") == 0){
                                print '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" "width="320" height="240">';
                                echo '<br>';
                                echo '<br>';
                                echo $row['filename'];
                                echo "image";
                            }
                            elseif(strcmp("$ext", "jpg") == 0){
                                print '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" "width="320" height="240">';
                                echo '<br>';
                                echo '<br>';
                                echo $row['filename'];
                                echo "image";
                            }
                            elseif(strcmp("$ext", "png") == 0){
                                print '<img src="data:images/jpeg;base64,'.base64_encode($row['image']).'" "width="320" height="240">';
                                echo '<br>';
                                echo '<br>';
                                echo $row['filename'];
                                echo "image";
                            }
                            elseif(strcmp("$ext", "mp4") == 0){
                                echo "video";
                                print '<video src="data:video/mp4;base64,'.base64_encode($row['image']).'" controls "width="320" height="240"></video>';
                            }
                            else{
                                echo "画像・動画の取得に失敗しました。";
                            }
                        }
                            echo '<br>';
                            print ('<form method="post" action="http://co-354.99sv-coco.com/dev/kadai_3-10delete.php" onSubmit="return checkSubmit()">');
                            
                            print ('<button style="width:100px;" class="btn btn-default" type="submit" name="delete" value="'.$row[id].'">削除</button>');
                        $row_count += 1;
                        echo '<hr>';
                // 改行を入れる
                        echo '<br>';
                    }
            ?>
            <p><?php print ("$row_count".'個の投稿があります') ?></p>
        </div>
        <script type="text/javascript">
            function checkSubmit() {
                return confirm("送信しても良いですか？");
            }
        </script>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>