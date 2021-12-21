<?php
/**
 * ファイルに保存されているデータをデシリアライズする
 * 
 */
include_once __DIR__.'/../settings.php';
include_once __DIR__.'/_include.inc';

$filename = "";
if(isset($_GET["stype"]) && $_GET['stype']=="bad"){
	$filename = SERIAL_FILE_BAD;	
}else{
	$filename = SERIAL_FILE_NORMAL;
}

/*
echo $filename;  //ファイルパスチェック用
*/

header('Content-Type: text/plain; charset=Shift_JIS');	//windowsのdirがshift-jisなので

$serial = file_get_contents($filename);

$s = "デシリアライズ前：\r\n{$serial}\r\n\r\n---------------------------\r\n";

echo mb_convert_encoding($s, "SJIS", "UTF-8");

$obj = unserialize($serial);

/*
echo mb_convert_encoding($obj, "SJIS", "UTF-8");
*/
