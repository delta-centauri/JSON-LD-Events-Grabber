<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . "/PK-AP8/";
require_once($rootPath . "main.class.php");

if (isset($_GET['url'])) {
    echo Main::getJsonLd($_GET['url']);
} else {
    echo "Something went terribly wrong.";
}
