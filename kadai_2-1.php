<!DOCTYPE html>
	<head>
		<title>���[�U�\</title>
	</head>
	<body>
		<p>post�ő��M</p>
		<form action="kadai_2-2.php" method="post">
			<label>���O�F</label>
			<input type="text" name="name">�@<br />
			<label>�R�����g�F</label>
			<input type="text" name="coment"> <br />
            <label>�p�X���[�h�F</label>
			<input type="text" name="new_pass"> <br />
			<label></label>	<input type="submit" value=" ���M ">
		</form> 
        <p>
            <form action="kadai_2-2.php" method="post">
            <label>�폜�ԍ�:</label>
            <input type="text" name="delete"> <br />
                
            <label>�p�X���[�h:</label>
            <input type="text" name="password"> <br />
            <input type="submit" value="���M">
            </form>
        </p>


        <p>
            <form action="kadai_2-5.php" method="post">
            <label>�ҏW�ԍ�:</label>
            <input type="text" name="edit"> <br />
            <input type="submit" value="���M">
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
