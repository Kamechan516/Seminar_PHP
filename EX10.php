<?php
    //配列を生成
    $friends = array("0番目に追加", "1番目に追加", "2番目に追加");
    $friends[5] = "5番目に追加";
    $friends[] = "index番号未指定を追加";

    echo count($friends)."<br>";

    //出力
    echo "<pre>";
    var_dump($friends);
    echo "</pre>";

    //末尾要素を削除
    array_pop($friends);

    //出力
    echo "<pre>";
    var_dump($friends);
    echo "</pre>";

    //先頭要素を削除
    array_shift($friends);

    //出力
    echo "<pre>";
    var_dump($friends);
    echo "</pre>";

    //要素を指定して削除
    unset($friends[0]);

    //出力
    echo "<pre>";
    var_dump($friends);
    echo "</pre>";

    //配列を再度採番する
    $friends = array_values($friends);

    //出力
    echo "<pre>";
    var_dump($friends);
    echo "</pre>";
?>
