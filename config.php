<?php
function vending_machine($price,$name){
  if($price >= 120){
    return $name."を購入してくれてありがとう"."<br/>";
  }
  else{
    return $name."の購入金額が不足しています"."<br/>";
  }
}
?>