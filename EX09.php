<?php
    //for文での処理
    for($i = 10; $i >= 1; $i--) {
        echo $i."<br>";
    }
    echo "<br />";
    //while文での処理
    $i = 10;
    while($i >= 1) {
        echo $i."<br>";
        $i--;
    }

    //Swich文での処理
    $total = 30;
    switch($total) {
        case 10:
            echo "10". "<br>";
        break;

        case 20:
            echo "20"."<br>";
        break;

        default:
            echo "その他"."<br>";
    }
?>