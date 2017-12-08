<?php
session_start();
//エラーメッセージの初期化
$errors = array();
 
if(empty($_POST)) {
	header("Location: http://co-354.99sv-coco.com/dev/kadai_3-9pre.php");
	exit();
}else{
	//POSTされたデータを変数に入れる
	$mail = $_POST['mail'];
	
	//メール入力判定
	if (!strlen($mail)){
		$errors['mail'] = "メールが入力されていません。";
	}else{
		if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)){
			$errors['mail_check'] = "メールアドレスの形式が正しくありません。";
		}
		
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
            // SQLステートメントを実行し、結果を変数に格納
                $stmt = $pdo->query("SELECT * FROM kadai36");
            // foreach文で配列の中身を一行ずつ出力
                foreach ($stmt as $row) {
                    if(strcmp($row['mail'],"$mail") == 0){
                        $errors['member_check'] = "このメールアドレスはすでに利用されております。";
                    }
                }
		/*
		ここで本登録用のmemberテーブルにすでに登録されているmailかどうかをチェックする。
		$errors['member_check'] = "このメールアドレスはすでに利用されております。";
		*/
	}
}

if (count($errors) === 0){
	
	$urltoken = hash('sha256',uniqid(rand(),1));
	$url = "http://co-354.99sv-coco.com/dev/kadai_3-6form.php"."?urltoken=".$urltoken;
	
	//ここでデータベースに登録する
	try{
		
		$statement = $pdo->prepare("INSERT INTO pre_member (urltoken,mail,date) VALUES (:urltoken,:mail,now() )");
		
		//プレースホルダへ実際の値を設定する
		$statement->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
		$statement->bindValue(':mail', $mail, PDO::PARAM_STR);
		$statement->execute();
			
		//データベース接続切断
		$pdo = null;	
		
	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		die();
	}
    //メールの宛先
	$mailTo = $mail;
 
 
	$name = "インターン掲示板登録";
	$mail = 'web@sample.com';
	$subject = "【インターン掲示板】会員登録用URLのお知らせ";
 
$body = <<< EOM
24時間以内に下記のURLからご登録下さい。
{$url}
EOM;
 
	mb_language('ja');
	mb_internal_encoding('UTF-8');
 
	//Fromヘッダーを作成
	$header = 'From: ' . mb_encode_mimeheader($name). ' <' . $mail. '>';
 
	if (mb_send_mail($mailTo, $subject, $body, $header)) {
	
	 	//セッション変数を全て解除
		$_SESSION = array();
	
		//クッキーの削除
		if (isset($_COOKIE["PHPSESSID"])) {
			setcookie("PHPSESSID", '', time() - 1800, '/');
		}
	
 		//セッションを破棄する
 		session_destroy();
 	
 		$message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録下さい。";
 	
	 } else {
		$errors['mail_error'] = "メールの送信に失敗しました。";
	}	
}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>メール確認画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>メール確認画面</h1>
 
<?php if (count($errors) === 0): ?>
 
<p><?=$message?></p>
 
<p>↓このURLが記載されたメールが届きます。</p>
<a href="<?=$url?>"><?=$url?></a>
 
<?php elseif(count($errors) > 0): ?>
 
<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>
 
<input type="button" value="戻る" onClick="history.back()">
 
<?php endif; ?>
 
</body>
</html>