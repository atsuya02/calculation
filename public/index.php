<?php
  require_once('../classes/user.php');
  require_once('../lib/security.php');

  $user = new User();
  $allUser = $user->getAll();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TOPページ</title>
</head>
<body>
  <h1>計算アプリ</h1>
  <h2>TOPページ</h2>
  <p>
    <a href="/public">TOPページ</a>
    <a href="/public/user_new.php">ユーザ登録</a>
    <a href="/public/purchase_record_new.php">購入履歴登録</a>
    <a href="/public/purchase_record_index.php">購入履歴一覧</a>
  </p>
  <table>
    <tr>
      <th>名前</th>
      <th>倍率</th>
    </tr>
    <?php foreach($allUser as $user): ?>
      <tr>
        <td><?php echo h($user['name']) ?></td>
        <td><?php echo h($user['magnification']) ?></td>
      </tr>
    <?php endforeach ?>
  </table>
</body>
</html>
