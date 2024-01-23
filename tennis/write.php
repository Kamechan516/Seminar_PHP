<?php
    //データ受信
    $name = $_POST['name'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $pass = $_POST['pass'];

    //データ検査
    if ($name == "" || $body == "") {
        echo '<form method="post" action="./bbs.php" style="display: inline"><button>名前または内容が空文字</button></form>';
        exit();
    }
    if (!preg_match("/^[0-9]{4}$/", $pass)) {
        echo '<form method="post" action="./bbs.php" style="display: inline"><button>パスワードは数字で4桁です</button></form>';
        exit();
    }

    //DB接続設定
    $dsn = 'mysql:host=db;dbname=tennis;charset=utf8';
    $user = 'root';
    $password = 'MySQL-Root';

    //DB接続と書き込み
    try {
        //PDOインスタンスの作成
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //プリペアードステートメントを作成
        $stmt = $db->prepare("INSERT INTO bbs (name, title, body, date, pass) VALUES (:name, :title, :body, now(), :pass)");

        //プリペアードステートメントに割り当て
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':body', $body, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

        //クエリの実行
        $stmt->execute();

        //bbs.phpに戻る
        echo '<form method="post" action="./bbs.php" style="display: inline"><button>書き込み完了</button></form>';
    } catch (PDOException $e) {
        //bbs.phpに戻る
        echo '<form method="post" action="./bbs.php" style="display: inline"><button>' . "エラー: " . $e->getMessage() . '</button></form>';
    }
?>
