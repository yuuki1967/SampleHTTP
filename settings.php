<?php
/**
 * OWASP Top 10解説のためのデモプログラム設定ファイル
 * 
 */

//データベース
define("DB_HOST", "127.0.0.1");
define("DB_PORT","3306");
define("DB_DATABASE","owasp");
define("DB_USER","owasp_user");
define("DB_PASS","owasp2017");

//シリアライズファイルパス(安全でないデシリアライゼーション)
/*
define("SERIAL_FILE_NORMAL", "./a08/serial_normal");
define("SERIAL_FILE_BAD", "./a08/serial_bad");
*/

define("SERIAL_FILE_NORMAL", "serial_normal");
define("SERIAL_FILE_BAD", "serial_bad");

/**
 *
 * @param PDO $dbh
 * @return int
 */
function getProductCount($dbh){
	$sql = "select count(*) from ORDERS";
	$stmt = $dbh->prepare ($sql);
	$cnt = -1;
	if ($stmt->execute() ){
		if( $row = $stmt->fetch (PDO::FETCH_NUM) ) {
			$cnt = (int)$row[0];
		}
	}
	return $cnt;
}
/**
 * ;extension=php_pdo_mysql.dll
 * @return PDO
 */
function getPDOConnection(){
	$dsn = 'mysql:dbname=' . DB_DATABASE . ';host=' . DB_HOST.';charset=utf8;port='.DB_PORT;
	$dbh = new PDO($dsn,DB_USER,DB_PASS/*,array(PDO::ATTR_EMULATE_PREPARES => false)*/);
	return $dbh;
}
?>
