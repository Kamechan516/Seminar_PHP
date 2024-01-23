<?php
function print_name(){
  $name = "太郎";
  echo "名前は".$name."<br/>";
}
global $name;

print_name();
echo $name;
?>