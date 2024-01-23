<!doctype html>
<html lang="ja" >
  <head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>

    <?php include('navbar.php'); ?>

    <main role="main" class="container" style="padding:60px 15px 0">
      <div>
        <!-- ここから「本文」-->

        <h1>お知らせ</h1>

        <?php
          //$info = file_get_contents("./data/info.txt");
          //echo "<p>".nl2br($info)."</p>";
          $fp = @fopen("./data/info.txt","r");
          if(!$fp)
          {
            echo '<p>エラー！お知らせファイルが開けません。ERR001</p>';
          }
          if($fp)
          {
            $title = fgets($fp);
            if ($title)
            {
              echo '<p><a href="info.php">'.$title.'</a></p>';
              fclose($fp);
            }
            if(($fp)&&(empty($title)))
            {
              echo '<p>お知らせはありません</p>';
              fclose($fp);
            }
          }
        ?>

        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
