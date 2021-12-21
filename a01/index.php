<?php
include_once '../settings.php';
$user = "suzuki";

$keyword = "";
if(isset($_GET['keyword'])){
	$keyword = $_GET['keyword'];
	//Comment.
}
$mysqli = new mysqli(DB_HOST.':'.DB_PORT, DB_USER, DB_PASS, DB_DATABASE);

$sql = "SELECT *  FROM ORDERS WHERE USER='%s'";
if($keyword){
	$sql .= " AND PRODUCT='%s'";
}
print("元のSQL：<b>$sql</b><br><hr>");
if($keyword){
	$sql = sprintf($sql,$user,$keyword);
}else{
	$sql = sprintf($sql,$user);
}
print("入力値組み込み後のSQL：<b>$sql</b><br><hr>");
//	$sql = "SELECT * FROM ORDERS";

//mysql_query("SET NAMES ujis;");

$res = $mysqli->query($sql);
$row = null;
?>


<b><?php print($user); ?></b> さんのオーダ情報<br>
<table border="1">
<tr><th>User</th><th>Product</th><th>Amount</th><th>OrderedOn</th></tr>
<?php
	while( ($row=$res->fetch_array())!=null ){
		print("<tr>");
		print("<td>".$row['USER']."</td>");
		print("<td>".$row['PRODUCT']."</td>");
		print("<td>".$row['AMOUNT']."</td>");
		print("<td>".$row['ORDERED_ON']."</td>");
		print("</tr>");
	}
?>
</table>
<b>
<form>
キーワードで絞り込み：
	<input type="text" name="keyword" value="<?=$keyword ?>"><br>
	<input type="submit" value="Search">
</form>
<br>

