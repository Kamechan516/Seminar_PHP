<?php
    for($i = 1; $i <= 31; $i++) {
        echo $i. "&nbsp;";
        if($i % 7 == 0) {
            echo "<br>";
        }
    }
    echo "<br>";


    //前置演算子と後置演算子
    $c = 1;
    //後置演算子で出力
    echo $c++;
    echo "<br>";

    $c = 1;
    //前置演算子で出力
    echo ++$c;
    echo "<br>";

    //カレンダー(while文を使用)
    $i = 1;
    while($i <= 31) {
        echo $i."&nbsp;";
        $i++;
        if($i % 7 == 0) {
            echo "<br>";
        }
    }

?>