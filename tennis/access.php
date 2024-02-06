<?php

//ファイルを開く
$fp = fopen("./data/log.txt", "a");

if($fp) {
    //ファイルに時刻（サーバー）のを書き込む
    fwrite($fp, time(). "\n");
}

//ファイルを閉じる
fclose($fp);

//line配列を作成    
$line = array();

//log.txtに書き込み
$line = file('./data/log.txt');

//アクセスされた回数を表示｀
echo count($line)."回目のアクセスです";
?>