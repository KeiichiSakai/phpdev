<!DOCTYPE HTML>
	<head>
		<title>���[�U�o�^�������܂����B</title>
	</head>


	<body>
		<h1>���[�U�o�^����</h1>
		<p>
			<?php
			$name = $_POST["name"];
			$coment = $_POST["coment"];
            $delete = $_POST["delete"];
            $edit = $_POST["edit"];
            $new_pass = $_POST["new_pass"];
            $password = $_POST["password"];
			$T = date("Y/m/j/H��i��");
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
                    echo "$delete"."�Ԃ̃��R�[�h���폜���܂����B";
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
                    $show = "�Ȃ܂��F".$name."<br />"."�R�����g�F".$coment."<br />";
                    print($show);
                    echo "$edit"."�Ԃ̃��R�[�h��ҏW���܂����B";
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
                    $show = "�Ȃ܂��F".$name."<br />"."�R�����g�F".$coment;
                    @fwrite($fp,$recode);
                }
                print($show);
                fclose($fp);
            }
			?>
		</p>
		<a href="http://co-354.99sv-coco.com/dev/kadai2.txt">���[�U�ꗗ</a>
	</body>
</html>