<?php
require("control.php")
?>
<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Andreas Rein - valutakalkulator">
        <meta name="keywords" content="web, app, valuta, valutakalkulator, currency converter">
        <meta name="author" content="Andreas Rein">
        <title>Valuta</title>
        <link rel="stylesheet" href="stylesheets/styles.css">
        <link rel='icon' type='image/ico' href='favicon.ico'>
    </head>

    <body>
        <script>
            var controller = new ScrollMagic.Controller();
        </script>
        <header>
            <h1>valutakalkulator</h1>
        </header>

        <?php
        // Load the XML file based on user input
        $xml = new DOMDocument();
        $xml->load("https://www.dnb.no/portalfront/datafiles/miscellaneous/csv/kursliste_ws.xml");


        // Load the XSL file
        $xsl = new DOMDocument();
        $xsl->load('valuta.xsl');


        // Configure the XSLT processor
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl); //Legger til XSL fila

        // Wrap the XML
        echo $proc->transformToXML($xml);
        ?>

        <footer>
            <a href="http://www.andreasrein.com">andreas rein</a>
        </footer>

        <script src="//cdn.jsdelivr.net/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/jquery.switchery/0.8.1/switchery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>