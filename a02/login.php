<?php
  $post_user = $_POST["user"];
  $post_pass = $_POST["pass"];

 if($post_user == $post_pass){
    setcookie("sessionID", "$post_user");

    $_SESSION["login"] = $post_user; //セッションにログイン情報を登録
    header("Location: index.php?keyword="); //ログイン後のページにリダイレクト
    exit();

 }else{
    //入力が間違っていた場合
    echo "入力が間違っています。";
    header('location:login_form.php');
    exit();
  }
  ?>
