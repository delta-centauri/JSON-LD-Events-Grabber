<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JSON-LD Event</title>

    <!-- http://schema.org/Event -->
    <script type="application/ld+json">
    [
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "url": "http://localhost/jldeg/external-website-simulation",
      "name": "Sample JSON-LD Site",
      "description": "Just an example",
      "author": {
          "@type": "Person",
          "name": "Roger Rutishauser"
        }
    },
    {
      "@context": { "@vocab": "http://schema.org/" },
      "@type": "Event",
      "name": "Reading: «2001 - A Space Odyssey»",
      "url": "http://www.example.com/reading",
      "description": "Looking forward to our next reading, this time with Arthur C. Clarke. - using description property",
      "about": "Looking forward to our next reading, this time with Arthur C. Clarke. - using about property",
      "startDate": "2018-04-21",
      "location": {
        "@type": "Place",
        "name": "Public library Langenthal",
        "sameAs": "http://www.bibliothek-langenthal.ch",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Hauptstrasse 20",
          "addressLocality": "Langenthal",
          "addressRegion": "BE",
          "postalCode": "4900",
          "addressCountry": "CH"
        }
      }
    },
    {
      "@context": { "@vocab": "http://schema.org/" },
      "@type": "BusinessEvent",
      "name": "Digital Librarianship",
      "url": "http://www.example.com/dl",
      "description": "DIGITAL LIBRARIANSHIP column discusses digital librarianship, which it defines as a subset of traditional librarianship. Says librarians must become increasingly familiar with digital collections in order to know when can they replace their traditional printed resources with the digital counterparts, either for a fee or for free. Reports that the phenomenon of free databases scared traditional publishers, noting they use every available forum to warn against the perils, although says that some expensive, traditional databases can also be bad. Highlights digital finding tools and says it is no accident that the best ones come from libraries and library schools that have librarians who are well-versed in organizing, cataloging, classifying, and indexing print and non-print documents. Maintains that digitally literate librarians will steer patrons to both the physical shelves and the virtual digital shelves for information.",
      "startDate": "2018-06-08T09:00:00+02:00",
      "endDate": "2018-06-10T17:00:00+02:00",
      "location": {
        "@type": "Place",
        "name": "Bibliothek Langenthal",
        "sameAs": "http://www.bibliothek-langenthal.ch",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Hauptstrasse 20",
          "addressLocality": "Langenthal",
          "addressRegion": "BE",
          "postalCode": "4900",
          "addressCountry": "CH"
        }
      }
    }
    ]
    </script>
</head>


<body>
<p style='font-size:100px;font-family:"Hobo Std";'>this is a <span style="color:purple;">sample page</span><br>that containts <span style="color:purple;">structured data (json-ld)</span><br>for an <span style="color:purple;">event</span>.</p>
</body>
</html>
