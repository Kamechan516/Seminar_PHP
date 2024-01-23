<?php
  // テスト結果を連想配列にする
  $result = array("math" => 90, "English" => 80);
  $friends = array("Haruki" => $result);
  dump($friends);

  $friends["Kaoru"] = array("math" => 95, "English" => 85);
  dump($friends);

  function dump($friends){
    echo"<pre>";
    var_dump($friends);
    echo"</pre>";
  }
?>