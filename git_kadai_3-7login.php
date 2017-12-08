<?php
    session_start();
?>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログイン</title>
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
        </div>
        <!--/.nav-collapse -->
        </div>
        </div>
        <br>
        <br>
        <div class="col-md-offset-3">
        <h1>ログイン</h1>
        </div>
        <br>
        <p>
            <?php
                if($_SESSION["unlogin"]){
                    echo $_SESSION["unlogin"];
                }
            ?>
        </p>
        <br>
        <div class="col-md-offset-2">
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

                $sql = "SELECT * FROM kadai36 ORDER BY id";

                // SQLステートメントを実行し、結果を変数に格納
                $stmt = $pdo->query($sql);
                
                if($_POST){
                        $name = $_POST["name"];
                        $password = $_POST["password"];
                            //一致したかどうかmysql
                            //一致したらcurrent_userにpostされた名前を入れ、掲示板へリダイレクト
                            foreach($stmt as $row){
                                if($row["name"] == $name and $row["password"] == $password){
                                    $_SESSION["current_user"] = $name;
                                    header('Location: http://co-354.99sv-coco.com/dev/kadai_3-7board.php');
                                    exit;
                                }
                            }
                    $error = "ログイン失敗：名前とパスワードが一致しませんでした。";
                }
                else{
                    $error = '<a href="http://co-354.99sv-coco.com/dev/kadai_3-9pre.php">ユーザ登録はこちら</a>';
                }
            ?>
        </p>
        <br>
            <p>登録済みユーザ名とパスワードを入力してください</p>
            <p>
                <?php
                    if ($error){
                        echo $error."<br>";
                    }
                ?>
            </p>
            <div class="container">
            <form method="post" action="http://co-354.99sv-coco.com/dev/kadai_3-7login.php" class="form-group">
                <label class="control-label col-xs-2">名前</label>
                <div class="form-group" style="width:500px;">
                
                <br>
                <input type="text" name="name" value="名前を入力してください。" class="form-control"><br />
                </div>
                <br />


                <br />
                <label class="control-label col-xs-2">パスワード</label>
                <div class="form-group" style="width:500px;">
                
                <br>
                <input type="text" name="password" value="パスワードを入力してください。" class="form-control">
                </div>
                <br />
                
                <br />
                <div class="form-group" style="width:100px;">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-default" style="width:100px;">送信</button>
                    </div>
                </div>
            </form>
            </div>
            <br>
            <br>
            <a href="http://co-354.99sv-coco.com/dev/kadai_3-6home.php">ホームにもどる</a>
        </div>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>