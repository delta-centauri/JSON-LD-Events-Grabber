jQuery(document).ready(function () {

    function parseJson(json) {
        jQuery.ajax({
            url: 'ajax/parse.php',
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
        var url = jQuery('.website-url').data('sample-url');
        if (jQuery('.website-url').val().indexOf("http") == 0) {
            url = jQuery('.website-url').val();
        }

        jQuery.ajax({
            url: 'ajax/getJsonLd.php',
            data: {
                url: url
            },
            cache: false
        })
        .done(function(data) {
console.log(JSON.parse(data));
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
        //jQuery('span.add-remove-cat').on('click', function(event) {
        jQuery('.js-btnGetJsonLd').on('click', function(event) {
            event.stopPropagation();
            getJsonLd();
        });
    });

});
