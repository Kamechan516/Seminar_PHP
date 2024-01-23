<?php
$results = array("はるき" => array("math" => 90,"english" => 80,"japanese" => 85),
                "かおる" => array("math" => 80,"english" => 70,"japanese" => 75),
                "ひでと" => array("math" => 70,"english" => 60,"japanese" => 65)
            );

            foreach($results as $name => $score){
                echo"<br/ >".$name."<br/ >";
                foreach($score as $title => $point){
                    echo $title.":".$point."<br />";
                }
            }

            $results = array_values($results);
            foreach($results as $name => $score){
                echo "<br />".$name."<br />";
                $score = array_values($score);
                foreach($score as $title => $point){
                    echo $title.":".$point."<br />";
                }
            }

?>