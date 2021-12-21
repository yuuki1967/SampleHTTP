<?php 
session_start();

//ログイン済みかを確認
if (!isset($_SESSION['USER'])) {
    header('Location: login.php');
    exit;
}

//ログアウト機能
if(isset($_POST['logout'])){
    $_SESSION = [];
    session_destroy(); // セッションを完全に破棄
    header('Location: index.php'); // ログインしていない人向け画面に遷移
    exit;
}
?>
<!doctype html>
<html>
  <body>
    <!-- 中略 -->
    <div>
      <form method="post" action="member-index.php">
        <input type="submit" name="logout" value="ログアウト"><br>
        <p class="button-nav">一般ページに戻ります</p>
      </form>
    </div>
  </body>
</html>
