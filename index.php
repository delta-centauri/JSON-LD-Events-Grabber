<?php
/*
 * version 1.2.
 * 02.10.2017
 */
// include classes
include "main.class.php";

$sampleUrl = Main::$rootUrl.'external-website-simulation';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JSON-LD Event</title>
    <!-- custom styles -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <main class="main">
        <i class="author">Author: <a href="mailto:roger.rutishauser@iw.htwchur.ch">Roger Rutishauser</a>, HTW Chur (IW14 tz)</i>
        <h1>JSON-LD Grabber for EVENTS</h1>
        <h2>Get JSON-LD</h2>
        <p>
            Enter URL <small>(with http(s)://)</small>: <input data-sample-url="<?php echo $sampleUrl ?>" class="website-url" type="text" value="">
            <span class="btn js-btnGetJsonLd">Grab JSON-LD</span>
            <br>If empty, sample-URL <b><a href="<?php echo $sampleUrl; ?>"><?php echo $sampleUrl; ?></a></b> will be used.
        </p>
        <p>
            
        </p>
        <pre class="json-ld-result">[empty]</pre>

        <h2>Find and parse Event(s)</h2>
        <section class="events">[empty]</section>
    </main>




  <!-- SCRIPTS -->
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>

</html>
