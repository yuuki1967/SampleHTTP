<?php

///////////////////////////////////////////
// 初期設定ここから
///////////////////////////////////////////

// データベースサーバ アドレス
define("DB_HOST","127.0.0.1");

// データベースサーバ ポート番号(省略可)
//define("DB_PORT","3306");

// データベースサーバ ユーザ名
define("DB_USERNAME","owasp_user");

// データベースサーバ パスワード
define("DB_PASSWORD","owasp2017");

// データベースサーバ データベース名
define("DB_DATABASE","owasp");

///////////////////////////////////////////
// 初期設定ここまで
///////////////////////////////////////////


// 接続サーバ情報を整形する
$host = defined("DB_HOST")?DB_HOST:null;
if(!$host){
  $default_host = ini_get("mysql.default_host");
  $host = (!empty($default_host))?$default_host:"localhost";
}

$port = defined("DB_PORT")?DB_PORT:null;
if(!$port){
  $default_port = ini_get("mysqli.default_port");
  $port = (!empty($default_port))?$default_port:"3306";
}
$server = $host . ":" . $port;

// データベースサーバへの接続を試みる
if (!$con = @mysql_connect($server,DB_USERNAME,DB_PASSWORD)){
  print "Can not connect Server! host or username or password is wrong";
  exit;
}

// データベースへの接続を試みる
if(!mysql_select_db(DB_DATABASE,$con)){
  print "Can not connect Database! database name is wrong";
  exit;
}

print "Success!";
