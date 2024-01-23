<?php
date_default_timezone_set('Asia/Tokyo');
    echo mktime(10,19,0,10,24,2023)."<br>";
    echo time()."<br>";

    if(mktime(10,19,0,10,24,2023) >= time() - 600) {
        echo "タイムゾーンが調整されています"."<br />";
    }

    //課題2
    $a = "7";
    $b = 7;

    if($a === $b) {
        echo '$aと$bの値が等しい<br />';
    }else {
        echo '型または値が違います<br>';
    }

    //課題3
    $a = 99;

    if($a < 60) {
        echo "単位未認定<br />";
    }else{
        echo "単位認定<br />";
    }

    //多重if
    if($a < 60) {
        echo "単位未認定<br />";
    }else if($a >= 90) {
        echo "単位認定で優<br>";
    }

    //論理演算子で
    if($a < 60) {
        echo "単位未認定<br />";
    }

    if($a >= 60 && $a < 90) {
        echo "単位認定で普通評価<br>";
    }

    if($a >= 90) {
        echo "単位認定で優評価<br>";
    }
?> 