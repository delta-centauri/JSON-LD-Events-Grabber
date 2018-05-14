<?php
require_once "../main.class.php";

if (isset($_POST['json'])) {

    $parsed = Main::parse($_POST['json']);

    /* write json file with parsed data */
    $jsonFile = fopen(Main::$rootPath."serve/events.json", "wa+");
    fwrite($jsonFile, json_encode($parsed));
    fclose($jsonFile);

    /* echo */
    echo '<h3>PHP Array:</h3>';
    echo '<pre class="json-ld-result-php">';
    print_r($_POST['json']);
    echo '</pre>';
    echo '<h3>New array, will be used for *real* html output</h3>';
    echo '<pre class="json-ld-result-php">';
    print_r($parsed);
    echo '</pre>';

    // *real* html output here:
    echo '<h2>The actual output! :-)</h2>';
    echo '<p class="text-larger"><a href="'.Main::$rootUrl.'serve/events.json'.'">Open JSON file</a></p>';
    foreach ($parsed as $p) {
        if ($p["success"]) {
            $description = '';
            if ($p["description"] !== "") {
                $description .= $p["description"]." ";
            }
            if ($p["about"] !== "") {
                $description .= $p["about"];
            }
            echo '<div class="event text-larger">';
            echo '<div class="content">';
            echo '<h3>'.$p["name"].'</h3>';
            echo '<strong>Description: </strong><br>';
            echo $description;
            echo '</p>';
            if ($p["startDateISO8601"] !== "") {
                echo '<p><strong>Date: </strong><br>';
                echo Main::getDate($p["startDateISO8601"], "d.m.Y");
                if ($p["endDateISO8601"] !== "" && Main::getDate($p["startDateISO8601"], "d.m.Y") !== Main::getDate($p["endDateISO8601"], "d.m.Y")) {
                    echo " - ".Main::getDate($p["endDateISO8601"], "d.m.Y");
                }
                echo '</p>';
                if (Main::getDate($p["startDateISO8601"], "H:i") !== "00:00") {
                    echo '<p><strong>Time: </strong><br>';
                    echo Main::getDate($p["startDateISO8601"], "H:i");
                    if ($p["endDateISO8601"] !== "") {
                        echo ' - ';
                        echo Main::getDate($p["endDateISO8601"], "H:i");
                    }
                    echo '</p>';
                }
            }            
            if ($p["url"] !== "") {
                echo '<p>[<a href="'.$p["url"].'">Details</a>]</p>';
            }
            echo '</div>';
            echo '</div>';
        }
    }





} else {
    echo "Something went terribly wrong 1.";
}



/*
<div class="red-font">No event in this element found.</div>
<div class="green-font">Event element found:</div>
*/
