<?php
/**
 * 設定情報などの漏えい、不適切なエラーハンドリング（2007 A6）
 * エラーメッセージを表示してしまう脆弱性。
 * 
 * ユーザー名や商品名に１１文字以上、数量に数字でなく文字列を入力、でエラーを起こせる
 * 
 * 
 */
include_once '../settings.php';

error_reporting(E_ALL);


$dbh = getPDOConnection();
$orderCount = getProductCount($dbh);
if($orderCount<0){
	die("商品数が取得できない");	
}

if(isset($_POST['product']) && isset($_POST['amount'])){
	
	//PDOを使っているので、インジェクションからは守られている
	$sql = "INSERT INTO ORDERS(NUM,USER,PRODUCT,AMOUNT,ORDERED_ON) VALUES(:num,:user,:product,:amount,CURRENT_DATE)";
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":num", $orderCount+1);	//ユニーク
	$stmt->bindValue(":user", $_POST['user']);
	$stmt->bindValue(":product", $_POST['product']);
	$stmt->bindValue(":amount", $_POST['amount']);
	
	
	$res = $stmt->execute();
	if (!$res) {
		echo "失敗しました<br>";
		print_r($stmt->errorInfo());	//画面に出すのではなく、管理者しか見られないログなどに出力すべき
	}else{
		echo "登録成功<br>";
	}
}


//if($row = mysql_fetch_row($res)){
//}


?>
オーダー情報登録：
<form method="post">
ユーザー名：<input type="text" name="user"><br>
商品：<input type="text" name="product"><br>
数量：<input type="text" name="amount">
<input type="submit" value="送信">


</form>
