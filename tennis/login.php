<?php
session_start();

// if (!isset($_SESSION['id'])) {
//     //ログイン中
//     header('Location: ./login.php');
//     exit();
// }

//初回ログイン
if (isset($_POST['name']) && isset($_POST['password'])) {
    $dns = 'mysql:host=db;dbname=tennis;charset=utf8';
    $user = 'root';
    $password = 'MySQL-Root';

    try {
        $db = new PDO($dns, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $stmt = $db->prepare("SELECT * FROM users WHERE name=:name AND password=:pass");

        $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', hash("sha256", $_POST['password']), PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            //認証成功
            $_SESSION['id'] = $row['id'];
            header('Location:./index.php');
            exit();
        } else {
            echo '<form method="post" action="./index.php" style="display:inline"><button>認証失敗</button></form>';
            exit();
        }
    } catch (PDOException $e) {
        die('エラー：' . $e->getMessage());
    }
}
?>

<!doctype html>
<html lang="ja">
<head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
        form {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            text-align: center;
        }

        #name {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #password {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>

<main role="main" class="container" style="padding:60px 15px 0">
    <div>
        <!-- ここから「本文」-->

        <form action="login.php" method="post">
            <h1>サークルサイト</h1>
            <label class="sr-only">ユーザ名</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="ユーザ名">
            <label class="sr-only">パスワード</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
            <input type="submit" class="btn btn-primary btn-block" value="ログイン">
        </form>

        <!-- 本文ここまで -->
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>