<?php
/**
 * アクセス制御の不備　デモ
 * 
 * suzukiユーザーでログインしているとする（ログインはデモでは未実装）。
 * 
 * index.php suzukiユーザーのオーダー情報一覧
 * detail.php　一覧で選択した、オーダー情報詳細を表示
 * 
 * detail.phpはパラメータでオーダーIDを受け取り、対応するオーダーを表示する。
 * 一覧画面ではsuzukiユーザーの情報のみ表示するようコントロールされているが、詳細表示画面ではそのコントロールが欠けている。
 * 
 */
include_once '../settings.php';
$user = "suzuki";

$dbh = getPDOConnection();

$sql = "SELECT *  FROM ORDERS WHERE USER=:user";
$sql = sprintf($sql,$user);

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user', $user);
$records = [];
if ($stmt->execute() ){
	$records = $stmt->fetchAll();
// 	if( $row = $stmt->fetch (PDO::FETCH_NUM) ) {
// 		$records[] = $row;		
// 	}
}


?>
<b><?php print($user); ?></b> さんのオーダ情報<br>
<table border="1">
<tr><th>OrderID</th><th>User</th><th>Product</th><th>&nbsp;</th></tr>
<?php
	foreach( $records as $rst ){
		print("<tr>");
		print("<td>".$rst['NUM']."</td>");
		print("<td>".$rst['USER']."</td>");
		print("<td>".$rst['PRODUCT']."</td>");
		print("<td><a href='detail.php?num=".$rst['NUM']."'>詳細</a></td>");
		print("</tr>");
	}
?>
</table>
