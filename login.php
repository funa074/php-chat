<?php
require_once("./init.php");
$color_path = "./colors.json";
$colors = json_decode(file_get_contents($color_path));

if (isset($_SESSION["user"]["name"])) {
  header('location: index.php');
  exit();
} elseif (!empty($_POST["user"]["name"]) && !empty($_POST["user"]["color"])) {
  $_SESSION["user"] = $_POST["user"];
  header('location: index.php');
  exit();  
}

$title = "Login";
require "./layout.php";
?>

<div class="login-box">
  <h1 class="login-ttl">ログインページ</h1>
  <form class="login-form" action="login.php" method="post">
    <div class="form-group">
      <label class="login-form__label">名前</label>
      <input class="login-form__input" type="text" name="user[name]" />
    </div>
    <div class="form-group">
      <label class="login-form__label">使用する色を選択して下さい。</label>
      <select class="login-form__select" name="user[color]">
        <?php foreach ($colors as $color): ?>
        <option value="<?= $color->color ?>"><?= $color->color ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button class="login__submit" type="submit">ログイン</button>
  </form>
</div>
</div>
</body>

</html>