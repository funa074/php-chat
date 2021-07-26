<?php
require_once("./init.php");
require_once("./chat_data.php");

if (empty($_SESSION["user"]["name"])) {
  header('location: login.php');
  exit();
} else {
  $user = $_SESSION["user"];
}

$title = "Chat";
$userName = $user["name"];
$userColor = $user["color"];

require_once("./layout.php");
?>

<div class="head">
  <h1 class="chat-ttl" style="color:<?= $userColor ?>">チャット</h1>
  <a href="./logout.php" class="logout-btn">ログアウト</a>
</div>
<div class="chat-box">
  <div class="chat-info">
    <p>名前</p>
    <p>
      <?= $userName ?>
    </p>
    <p>カラー</p>
    <p>
      <?= $userColor ?>
    <p>
  </div>
  <ul class="chat-list">
    <?php if(empty($messages)): ?>
    <p>投稿がありません</p>
    <?php else: ?>
    <?php foreach($messages as $msg): ?>
    <li style="color:<?= $msg->color ?>">
      名前:
      <?= $msg->name ?><br>
      内容:
      <?= $msg->message ?>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</div>

<div class="foot">
  <form class="chat-form" action="input.php" method="post">
    <input type="hidden" name="message[name]" value="<?= $userName ?>">
    <input type="hidden" name="message[color]" value="<?= $userColor ?>">
    <input class="chat-input" type="text" name="message[message]" />
    <button class="chat-button" type="submit">投稿</button>
  </form>
</div>
</body>

</html>