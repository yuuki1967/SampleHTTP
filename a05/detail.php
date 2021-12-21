<?php
include_once '../settings.php';

$num = $_GET['num'];
$user = "suzuki";

$dbh = getPDOConnection();

$sql = "SELECT * FROM ORDERS WHERE NUM=:num";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':num', $num);

$records = [];
$rst = null;
if($stmt->execute()){
	$records = $stmt->fetchAll();
	if(count($records)>0){
		$rst = $records[0];
	}
}


if($rst){
?>
<h2>オーダ情報詳細</h2>
オーダID：<b><?php print($num) ?></b>
<br>
<table border="1">
<tr><th>User</th><th>Product</th><th>Amount</th><th>OrderedOn</th></tr>
<tr>
	<td><?php print($rst['USER']); ?></td>
	<td><?php print($rst['PRODUCT']); ?></td>
	<td><?php print($rst['AMOUNT']); ?></td>
	<td><?php print($rst['ORDERED_ON']); ?></td>
</tr>
</table>
<?php }?>
