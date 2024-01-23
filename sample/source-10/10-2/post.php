<?php
  // お名前
  $name = $_POST['name'];

  // 性別
  $gender = $_POST['gender'];
  switch($gender) {
    case "man":
      $gender = "男性";
    break;

    case "woman":
      $gender = "女性";
    break;
    
    default:
      $gender = "不正な値";
    break;
  }
  
  //評価編集
  $tmp_star = intval($_POST['star']);
  $star = '';
  if($tmp_star < 1 || $tmp_star > 5) {
    $star = "不正な値です";
  }

  // 評価
  $tmp_star = $_POST['star'];
  $star = ''; // 画面へ出力する用の文字列
  for ($i = 0; $i < $tmp_star; $i++){
    $star .= '★'; // 送信された評価の数だけ★を追加
  }
  for (; $i < 5; $i++){
    $star .= '☆'; // 「5-送信された数字」の分だけ☆を追加
  }

  // ご意見
  $other = $_POST['other'];
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>アンケート結果</title>
  </head>
  <body>
    <h1>アンケート結果</h1>
    <p>お名前：<?php echo $name; ?></p>
    <p>性別：<?php echo $gender; ?></p>
    <p>評価：<?php echo $star; ?></p>
    <p>ご意見：<?php echo nl2br($other); ?></p>
  </body>
</html>
