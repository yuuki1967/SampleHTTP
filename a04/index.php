<?php 
/**
 * XXEのサンプルプログラム
 * 参考：
 * https://blog.tokumaru.org/2017/12/introduction-to-xxe-for-php-programmers.html
 * 
 * 
 */
?>
<html>
	<head>
		<title>A4.XML外部エンティティ参照</title>
	</head>	
<body>
	<h3>オンラインアドレス帳</h3>
	
	アドレス帳のXMLを送信してください：
	<form action="xxe.php" method="post" enctype="multipart/form-data">
		<input type="file" name="user" />
		<input type="submit"/>
	</form>
</body>
</html>