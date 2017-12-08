<?php
    session_start();
?>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>掲示板</title>
         <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

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
        <br>
        <br>
        <br>
        <p>
            <?php
                if(isset($_SESSION["msg"])){
                    print ($_SESSION["msg"]);
                    unset($_SESSION["msg"]);
                }else{
                    echo "下のフォームからコメントを入力してください。";
                }
            ?>
        </p>
        <p>
            <?php
                if(isset($_SESSION["current_user"])){
                    print ('こんにちは'.$_SESSION["current_user"].'さん');
                    $name = $_SESSION["current_user"];
                }
                else{
                    echo "こんんちはゲストさん";
                }
            ?>
        </p>
        <br>
        <div class="col-md-offset-3">
        <h1>コメント一覧</h1>
        </div>
        <div class="col-md-offset-2">
        <?php
            $host = 'localhost';
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
            $msg = "フォームに入力してください。";
            $sql = "SELECT * FROM board ORDER BY id";
            // SQLステートメントを実行し、結果を変数に格納
                $stmt = $pdo->query($sql);
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
                    echo '<hr>';
            // 改行を入れる
                    echo '<br>';
                }
            ?>
        <br>
        <h2>コメント投稿</h2>
        <div class="container">
        <form method="post" action="http://co-354.99sv-coco.com/dev/kadai_3-7boardpost.php" enctype="multipart/form-data" class="form-horizontal">
            <br>
            <label>名前</label>
            <div class="form-group" style="width:500px;">
            <br>
            <?php echo '<input class="form-control" type="text" name="name" value="'.$name.'">'; ?>
            </div>
            <br>
            <label>コメント</label>
            <div class="form-group" style="width:500px;">
            <br>
            <input class="form-control" type="text" name="coment">
            </div>
            <br>
            <label>画像・動画ファイル</label>
            <div class="form-group" style="width:300px;">
            <br>
            <input class="form-control" type="file" name="image">
            </div>
            <br />
            <button style="width:100px;" class="btn btn-default" type="submit">投稿</button>
        </form>
        </div>
        <p>
            <?php
                if(!isset($_SESSION["current_user"])){
                    print ('<a href="http://co-354.99sv-coco.com/dev/kadai_3-6form.php">ユーザ登録はこちら</a>');
                    print "<br>";
                    print "<br>";
                    print ('<a href="http://co-354.99sv-coco.com/dev/kadai_3-7login.php">ログインはこちら</a>');
                }else{
                    print ('<a href="http://co-354.99sv-coco.com/dev/kadai_3-7logout.php">ログアウト</a>');
                }
            ?>
        </p>
        <br>
        <a href="http://co-354.99sv-coco.com/dev/kadai_3-6home.php">ホームにもどる</a>
        <br>
        <br>
        </div>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>