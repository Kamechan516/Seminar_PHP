<pre>
<?php
  $classA = array("ClassA:はるき", "ClassA:かおる", "ClassA:ひでと");
  $classB = array("ClassB:ゆきこ", "ClassB:ゆか", "ClassB:まなみ");
  $classC = array("ClassC:はるき", "ClassC:かおる", "ClassC:ひでと");
  $classD = array("ClassD:ゆきこ", "ClassD:ゆか", "ClassD:まなみ");
  $students = array($classA, $classB, $classC, $classD);
  
  //出力
  echo "<pre>";
  var_dump($students);
  echo "</pre>";
?>
