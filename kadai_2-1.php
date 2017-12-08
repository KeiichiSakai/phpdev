<!DOCTYPE html>
	<head>
		<title>ユーザ表</title>
	</head>
	<body>
		<p>postで送信</p>
		<form action="kadai_2-2.php" method="post">
			<label>名前：</label>
			<input type="text" name="name">　<br />
			<label>コメント：</label>
			<input type="text" name="coment"> <br />
            <label>パスワード：</label>
			<input type="text" name="new_pass"> <br />
			<label></label>	<input type="submit" value=" 送信 ">
		</form> 
        <p>
            <form action="kadai_2-2.php" method="post">
            <label>削除番号:</label>
            <input type="text" name="delete"> <br />
                
            <label>パスワード:</label>
            <input type="text" name="password"> <br />
            <input type="submit" value="送信">
            </form>
        </p>


        <p>
            <form action="kadai_2-5.php" method="post">
            <label>編集番号:</label>
            <input type="text" name="edit"> <br />
            <input type="submit" value="送信">
            </form>
        </p>

        <p>
            <?php
                $fp = @file('kadai2.txt');
                foreach($fp as $ar) {
                $exp = explode("@",$ar);
                    
                echo "<pre>";
                print_r($exp);
                echo "</pre>";
                }
            ?>
        </p>
	   </body>
</html>
