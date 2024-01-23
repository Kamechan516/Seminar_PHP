<?php
function get_price($price){
  $price *= 1.1;
  return $price;
}
function display($name="太郎"){
  echo "私の名前は".$name."<br/>";
}

echo get_price(300)."<br/>";
echo display();
echo display("華子");

?>