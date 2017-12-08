<!DOCTYPE html>
	<head>
		<title>ユーザ表</title>
	</head>
	<body>
		<p>postで送信</p>
		<form action="kadai_2-2.php" method="post">
			<label>名前：</label>
			<?php
                $edit = $_POST["edit"];
                $fp = @file("kadai2.txt");
                foreach($fp as $recode) {
                    $edit_recode = explode("@",$recode);
                    if ($edit_recode[0] == $edit) {
                        echo '<input type="text" name="name" value="'.$edit_recode[1].'"><br />';
                    }
                }
            ?>
            <br />
            
			<label>コメント：</label>
            <?php
                $edit = $_POST["edit"];
                $fp = @file("kadai2.txt");
                foreach($fp as $recode) {
                    $edit_recode = explode("@",$recode);
                    if ($edit_recode[0] == $edit) {
                        echo '<input type="text" name="coment" value="'.$edit_recode[2].'"><br />';
                    }
                }
            ?>
            <br />
            <label>パスワード：</label>
            <input type="text" name="password">
            <br />
            <?php
                $edit = $_POST["edit"];
                $fp = @file("kadai2.txt");
                foreach($fp as $recode) {
                    $edit_recode = explode("@",$recode);
                    if ($edit_recode[0] == $edit) {
                        echo '<input type="text" name="edit" value="'.$edit_recode[0].'"><br />';
                    }
                }
            ?>
			<br />
            
			<input type="submit" value=" 送信 ">
		</form> 
        
	   </body>
</html>