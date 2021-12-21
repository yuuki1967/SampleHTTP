<?php
$doc = new DOMDocument();
$doc->substituteEntities = true;	//libxml2のバージョン2.9.0以降はデフォルトでfalseとなっているので、わざとtrueにする
$doc->load($_FILES['user']['tmp_name']);
$users = $doc->getElementsByTagName("user");
?>

<body>
以下の内容で登録しました<br>
<table border="1">
	<tr><th>No.</th><th>氏名</th><th>住所</th></tr>
<?php for( $i=0; $i<$users->length; $i++ ){ ?>
<?php 
			$user = $users->item($i);
			$name = $user->getElementsByTagName('name')->item(0)->textContent;
			$address = $user->getElementsByTagName('address')->item(0)->textContent;
?>
		<tr>
			<td><?=($i+1) ?></td>
			<td><?=htmlspecialchars($name) ?></td>
			<td><?=htmlspecialchars($address) ?></td>
		</tr>
<?php } ?>
</table>
<br>
<a href="index.php">戻る</a>
</body>


