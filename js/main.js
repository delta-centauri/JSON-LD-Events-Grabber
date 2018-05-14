jQuery(document).ready(function () {

    function parseJson(json) {        
        var ajaxUrl = location.protocol + "//" + location.hostname + location.pathname + 'ajax/parse.php';
        jQuery.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                json: json
            }
        })
        .done(function(output) {
            jQuery('.events').replaceWith(output);
        })
        .fail(function(aa) {
            jQuery('.events').html("could not parse json.");
        });
    }

    function getJsonLd() {
        jQuery('.json-ld-result').text("");
        var eventUrl = jQuery('.website-url').data('sample-url');
        if (jQuery('.website-url').val().indexOf("http") == 0) {
            eventUrl = jQuery('.website-url').val();
        }

        var ajaxUrl = location.protocol + "//" + location.hostname + location.pathname + 'ajax/getJsonLd.php';
        jQuery.ajax({
            url: ajaxUrl,
            data: {
                eventUrl: eventUrl
            },
            cache: false
        })
        .done(function(data) {
            jQuery('.json-ld-result').html(data);
            var jsonObj = JSON.parse(data);
            parseJson(jsonObj);
        })
        .fail(function() {
            jQuery('.json-ld-result').html("could not load json-ld or nothing found.");
        });

    }

    /* event */
    jQuery(function() {
        jQuery('.js-btnGetJsonLd').on('click', function(event) {
            event.stopPropagation();
            getJsonLd();
        });
    });

});
