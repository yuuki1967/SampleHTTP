<?php
include_once '../settings.php';
$user = "suzuki";
$val = $_COOKIE["sessionID"];

if(isset($_GET['keyword'])){
	$conn = mysql_connect(DB_HOST.':'.DB_PORT,DB_USER,DB_PASS);
	$res = mysql_select_db(DB_DATABASE,$conn);

	$sql = "SELECT *  FROM ORDERS WHERE USER='%s' AND PRODUCT='%s'";
print("元のSQL：<b>$sql</b><br><hr>");	
	$sql = sprintf($sql,$_COOKIE["sessionID"],$_GET['keyword']);
print("入力値組み込み後のSQL：<b>$sql</b><br><hr>");	
//	$sql = "SELECT * FROM ORDERS";
	
	//mysql_query("SET NAMES ujis;");
	$res = mysql_query($sql,$conn);
	$rst=null;
	
?>
<b><?php print($val); ?></b> さんのオーダ情報検索結果<br>
<table border="1">
<tr><th>User</th><th>Product</th><th>Amount</th><th>OrderedOn</th></tr>
<?php
	while( ($rst=mysql_fetch_array($res))!=null ){
		print("<tr>");
		print("<td>".$rst['USER']."</td>");
		print("<td>".$rst['PRODUCT']."</td>");
		print("<td>".$rst['AMOUNT']."</td>");
		print("<td>".$rst['ORDERED_ON']."</td>");
		print("</tr>");
	}
?>
</table>
<?php 
}
?>
<form>
	<input type="text" name="keyword" value="<?php print($_SESSION["login"]); ?>"><br>
	<input type="submit" value="Search">
</form>
