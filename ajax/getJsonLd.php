<?php
require_once "../main.class.php";

if (isset($_GET['eventUrl'])) {
    echo Main::getJsonLd($_GET['eventUrl']);
} else {
    echo "Something went terribly wrong 2.";
}
