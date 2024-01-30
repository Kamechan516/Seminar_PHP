<?php
// データの受け取り
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

// 必須項目チェック
if ($id == 0 || $pass == '') {
    echo '<form method="post" action="./bbs3.php" style="display:inline"><button>IDまたはPASSWORDが誤り</button></form>';
    // header('Location: bbs.php');
    // exit();
}

// DBに接続
$dsn = 'mysql:host=db;dbname=tennis;charset=utf8';
$user = 'root';
$password = 'MySQL-Root';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // プリペアドステートメントを作成
    $stmt = $db->prepare("DELETE FROM bbs WHERE id=:id AND pass=:pass");
    // パラメータ割り当て
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    // クエリの実行
    $stmt->execute();
} catch (PDOException $e) {
    exit('エラー：' . $e->getMessage());
}
echo '<form method="post" action="./bbs3.php" style="display:inline"><button>掲示内容は削除されました</button></form>';
// header('Location: bbs.php');
// exit();
?>
