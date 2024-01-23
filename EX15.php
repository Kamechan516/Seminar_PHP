<?php
echo mb_strlen("こんにちは")."<br/>";
$greeting = "こんにちは";
echo mb_strlen($greeting)."<br/>";

echo time()."<br/>";

$frutis = array("apple","lemon","banana");

sort($frutis);

foreach($frutis as $index => $value){
  echo $index.":".$value."<br/>";
}

?>