<?php
    //連想配列を生成
    $result = array(
            "Japanese" => 80,
            "math" => 75,
            "science" => 90
    );

    //確認
    echo "<pre>";
    var_dump($result);
    echo "</pre>";

    //数学の点数を上書き
    $result["math"] = 85;

    //確認
    echo "<pre>";
    var_dump($result);
    echo "</pre>";

    //音楽の点数を追加
    $result["music"] = 90;

    //確認
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
?>