<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>課題3-9　仮登録フォーム</title>
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
        <h1>課題３の　仮登録　フォームです</h1>
        </div>
        <br><br>
        <div class="col-md-offset-2">
        <div class="container">
        <form class="form-horizontal" action="kadai_3-9pre_check.php" method="post" onSubmit="return checkSubmit()">
			<label>登録用メールアドレスを入力してください</label>
            <br>
            <br>
            <div class="form-group" style="width:500px;">
            <input class="form-control" type="text" name="mail"><br />
            </div>
            <br />
            <br />
            
            <button style="width:100px;" class="btn btn-default"　type="submit">送信</button>
        </form>
        </div>
        <script type="text/javascript">
            function checkSubmit() {
                return confirm("送信しても良いですか？");
            }
        </script>
        <br>
        <br>
        <a href="http://co-354.99sv-coco.com/dev/kadai_3-6home.php">ホームページはこちら</a>
        </div>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>