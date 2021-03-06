<?php
  require_once('../../classes/user.php');

  $userParams = $_POST;
  $user = new User();
  $errorMessages = $user->userValidate($userParams);
  if (empty($errorMessages)) {
    $user->userCreate($userParams);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ユーザ作成</title>
</head>
<body>
  <?php include '../layout/header.php' ?>
  <h2>ユーザ作成</h2>
  <div>
    <?php if (empty($errorMessages)): ?>
      <p>ユーザを作成しました</p>
    <?php else: ?>
      <?php foreach($errorMessages as $errorMessage): ?>
        <p><?php echo $errorMessage ?></p>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</body>
</html>
