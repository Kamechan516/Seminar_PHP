<?php
//1ページ最大書き込み数
$num = 10;

//DBへの接続設定情報
$dsn = 'mysql:host=db;dbname=tennis;charset=utf8';
$user = 'root';
$password = 'MySQL-Root';

// 改ページ準備処理
$page = 1;
if (isset($_GET['page']) && $_GET['page'] > 1) {
    $page = intval($_GET['page']);
}

try {
    //DBに接続
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("select * from bbs order by date desc limit :lower, :num");

    //パラメータ割り当て
    $lower = ($page - 1) * $num;
    $stmt->bindParam(':lower', $lower, PDO::PARAM_INT);
    $stmt->bindParam(':num', $num, PDO::PARAM_INT);

    //クエリの実行
    $stmt->execute();
} catch (PDOException $e) {
    die("エラー:" . $e->getMessage());
}

require('./navbar.php');

echo <<< EOF
        <!DOCTYPE html>
        <html lang="ja">
        <head>
            <title>サークルサイト</title>
            <link rel="stylesheet" href="./css/bootstrap.min.css">
        </head>
        <body>
        <main role="main" class="container" style="padding:60px 15px 0">
EOF;

//掲示板内容表示（結果セットから1件ずつデータを取り出す）
while ($row = $stmt->fetch()) {
    ?>
    <div class="card">
        <div class="card-header"><?php echo $row['title'] ? $row['title'] : ' (無題) '; ?></div>
        <div class="card-body">
            <p class="card-text"><?php echo nl2br($row['body']) ?></p>
        </div>
        <div class="card-footer">
            <?php echo $row['name'] ?>
            (<?php echo $row['date'] ?>)
        </div>
    </div>
    <hr>

<?php
}

//ページ数表示
try {
    $stmt = $db->prepare("select count(*) from bbs");

    //クエリの実行
    $stmt->execute();

    //書き込み件数
    $counts = $stmt->fetchColumn();
} catch (PDOException $e) {
    exit("エラー:" . $e->getMessage());
}

//ページ数
$max_page = ceil($counts / $num);

//ページング処理
if ($max_page >= 1) {
    echo '<nav><ul class="pagination">';

    for ($i = 1; $i <= $max_page; $i++) {
        echo '<li class="page-item"><a href="./bbs2.php?page=' . $i . '">' . $i . '&emsp;</a></li>';
    }
    echo '</ul></nav>';
}
?>
</main>
<script src="./js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script>window.JQuery || document.Write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
