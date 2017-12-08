<?php
    session_start();
?>


<html>
<head><title>ログアウト</title></head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <li class="active"><a href="http://co-354.99sv-coco.com/dev/kadai_3-9pre.php">会員登録</a></li>
        <li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7login.php">ログイン</a></li>
        <li><a href="http://co-354.99sv-coco.com/dev/kadai_3-7board.php">掲示板</a></li>
        </ul>
        </div>
        <!--/.nav-collapse -->
        </div>
        </div>
        <br>
        <br>
            <div class="col-md-offset-2">
                <h1>ログアウトしました</h1>
                <?php
                    print('セッション変数の一覧を表示します。<br>');
                    print_r($_SESSION);
                    print('<br>');

                    print('セッションIDを表示します。<br>');
                    print($_COOKIE["PHPSESSID"].'<br>');

                    print('<p>ログアウトします</p>');

                    $_SESSION = array();

                    if (isset($_COOKIE["PHPSESSID"])) {
                        setcookie("PHPSESSID", '', time() - 1800, '/');
                    }

                    session_destroy();
                ?>

            </div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>