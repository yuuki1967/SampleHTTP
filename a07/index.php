<?php
session_start();	//document.cookieを表示するデモがあるため、セッションを開始する（セッションIDがほしい）
?>
<html>

<head>
</head>

<body>
<div id="d"></div>
<?php 
if( isset($_GET['cc']) ){
?>
	クレジット番号：<?=$_GET['cc'] ?>
	
	
	<br><br>
	<a href="index.php">戻る</a>
<?php 
}else{
?>
<form>
	クレジットカード番号:<br>
	<input type="text" name="cc" size="60"><br><br>
	<input type="submit" value="送信">
</form>
<?php }?>
</body>
</html>
