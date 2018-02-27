<?php

class Main
{

    public static $rootPath;
    public static $rootUrl;

    public static function init()
    {
        self::$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/';
        if (stripos(self::$rootPath, "xampp") !== false) {
            self::$rootPath .= 'PK-AP8/';
        }
        self::$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        if ($_SERVER['HTTP_HOST'] === "localhost") {
            self::$rootUrl .= 'PK-AP8/';
        }
    }

    public static function getJsonLd($url)
    {
        if (!$html = file_get_contents($url)) {
            return "\n\nURL not valid or no JSON-LD data found!";
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors(1);
        $dom->loadHTML($html);
        $xpath = new DOMXpath($dom);

        $jsonScripts = $xpath->query('//script[@type="application/ld+json"]');

        if ($jsonScripts->length < 1) {
            die("Error: No script node found");
        } else {
            $json = trim($jsonScripts->item(0)->nodeValue);
            //self::$json = json_decode($json);

            return print_r($json, true);
        }
    }  

    public static function getDate($date, $format)
    {
        $date = date($format, strtotime($date));
        return $date;
    }

    public static function parse($json)
    {
        // possible event types acording to http://schema.org/Event
        $possibleSchemaOrgEventTypes = array(
            "Event",
            "BusinessEvent",
            "ChildrensEvent",
            "ComedyEvent",
            "CourseInstance",
            "DanceEvent",
            "DeliveryEvent",
            "EducationEvent",
            "ExhibitionEvent",
            "Festival",
            "FoodEvent",
            "LiteraryEvent",
            "MusicEvent",
            "PublicationEvent",
            "SaleEvent",
            "ScreeningEvent",
            "SocialEvent",
            "SportsEvent",
            "TheaterEvent",
            "VisualArtsEvent",
            "EventSeries"
        );
        $arrReturn = array();
        if (is_array($json)) {
            foreach ($json as $key=>$element) {
                $return[$key]["success"] = false;
                if (array_key_exists('@type', $element)) {
                    if (in_array($element['@type'], $possibleSchemaOrgEventTypes)) {
                        $return[$key]["success"] = true;
                        $return[$key]["name"] = 'Unknown Title';
                        if (array_key_exists('name', $element)) {
                            $return[$key]["name"] = self::str_to_utf8($element['name']);
                        }
                        $return[$key]["url"] = '';
                        if (array_key_exists('url', $element)) {
                            $return[$key]["url"] = $element['url'];
                        }
                        $return[$key]["description"] = '';
                        if (array_key_exists('description', $element)) {
                            $return[$key]["description"] = self::str_to_utf8($element['description']);
                        }
                        $return[$key]["about"] = '';
                        if (array_key_exists('about', $element)) {
                            $return[$key]["about"] = self::str_to_utf8($element['about']);
                        }
                        $return[$key]["startDateISO8601"] = '';
                        if (array_key_exists('startDate', $element)) {
                            $return[$key]["startDateISO8601"] = $element['startDate'];
                        }
                        $return[$key]["endDateISO8601"] = '';
                        if (array_key_exists('endDate', $element)) {
                            $return[$key]["endDateISO8601"] = $element['endDate'];
                        }
                        /*
                        $return[$key]["location"] = 'unknown';
                        if (array_key_exists('location', $element)) {
                            $return[$key]["endDate"] = $element['endDate'];
                        }
                        */
                    }
                }
            }
        }
        return $return;
    }

    public static function str_to_utf8 ($str) 
    {
        $decoded = utf8_decode($str);
        if (mb_detect_encoding($decoded, 'UTF-8', true) === false) {
            return $str;
        }
        return $decoded;
    }      


}


Main::init();
