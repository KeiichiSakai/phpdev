<!DOCTYPE HTML>
	<head>
		<title>ユーザ登録完了しました。</title>
	</head>


	<body>
		<h1>ユーザ登録完了</h1>
		<p>
			<?php
			$name = $_POST["name"];
			$coment = $_POST["coment"];
            $delete = $_POST["delete"];
            $edit = $_POST["edit"];
            $new_pass = $_POST["new_pass"];
            $password = $_POST["password"];
			$T = date("Y/m/j/H時i分");
            if($delete or $edit){
                if ($delete){
                 $file1 = @file("kadai2.txt");
                        foreach($file1 as $ar1) {
                            $new1 = explode("@",$ar1);
                            if($new1[3] == $password and $new1[0] == $delete) {
                                $pass_match = 1;
                            }
                        }
                }
                else {
                    $file1 = @file("kadai2.txt");
                        foreach($file1 as $ar1) {
                            $new1 = explode("@",$ar1);
                            if($new1[3] == $password and $new1[0] == $edit) {
                                $pass_match = 1;
                            }
                        }
                }
            }
            if ($pass_match){
                if ($delete){
                    $file = @file("kadai2.txt");
                    $fp = fopen("kadai2.txt","w");
                    foreach($file as $ar) {
                        $new = explode("@",$ar);
                        if($new[0] > $delete){
                            $count = $new[0]-1; 
                            $newrecode = "$count@$new[1]@$new[2]@$new[3]@$new[4]";
                            @fwrite($fp,$newrecode);
                        }
                        elseif ($new[0] < $delete) {
                            $recode = "{$new[0]}@{$new[1]}@{$new[2]}@{$new[3]}@{$new[4]}";
                            @fwrite($fp,$recode);
                        }
                    }
                    echo "$delete"."番のレコードを削除しました。";
                    fclose($fp);
                }

                elseif ($edit) {
                    $file = @file("kadai2.txt");
                    $fp = fopen("kadai2.txt","w");
                    foreach($file as $ar) {
                        $new = explode("@",$ar);
                        if($new[0] == $edit) {
                            $new_recode = "$edit@$name@$coment@$new[3]@$T\n";
                            @fwrite($fp,$new_recode);
                        }
                        else {
                            $recode = "{$new[0]}@{$new[1]}@{$new[2]}@{$new[3]}@{$new[4]}";
                            @fwrite($fp,$recode);
                        }
                    }
                    $show = "なまえ：".$name."<br />"."コメント：".$coment."<br />";
                    print($show);
                    echo "$edit"."番のレコードを編集しました。";
                    fclose($fp);
                }
            }
            
            else {
                $fp = fopen('kadai2.txt', 'a+');
                if ($fp){
                        while (!feof($fp)) {
                            $buffer = fgets($fp);
                        $ar[] = $buffer;
                        $n = count($ar);
                    }
                    $recode = "$n@$name@$coment@$new_pass@$T\n";
                    $show = "なまえ：".$name."<br />"."コメント：".$coment;
                    @fwrite($fp,$recode);
                }
                print($show);
                fclose($fp);
            }
			?>
		</p>
		<a href="http://co-354.99sv-coco.com/dev/kadai2.txt">ユーザ一覧</a>
	</body>
</html>