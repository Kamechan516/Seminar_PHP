<?php
define("FRUITS0","apple");
define("FRUITS1",array("apple","lemon","banana"));
define("FRUITS2",array("apple"=>"100円","lemon"=>"150円","banana"=>"50円"));

echo FRUITS0."<br/>";

foreach(FRUITS1 as $value){
  echo $value."<br/>";
}

foreach(FRUITS2 as $index => $value){
  echo $index.":".$value."<br/>";
}
?>