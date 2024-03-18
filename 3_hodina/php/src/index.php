<!DOCTYPE html>
<html>

<body>
    <!-- <a href='xml/student.xml'>CD Catalog</a> -->
    <?php
    // Get the list of XML files using glob
    $xmlFiles = glob('xml/*.xml');

    // Display the options to select XML files
    echo '<form method="get" action="">';
    echo '<select name="xmlFile">';
    foreach ($xmlFiles as $file) {
        echo '<option value="' . $file . '">' . $file . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Display">';
    echo '</form>';

    // Load and display the selected XML file using XSL
    if (isset($_GET['xmlFile'])) {
        $xmlFile = $_GET['xmlFile'];

        // XML
        $xml = new DOMDocument;
        $xml->load($xmlFile);

        // XSL
        $xsl = new DOMDocument;
        $xsl->load('xml/cdcatalog.xsl');

        // Transformer
        $xslt = new XSLTProcessor();
        $xslt->importStylesheet($xsl);
        $transformedXml = $xslt->transformToXml($xml);

        // Output
        echo $transformedXml;
    } else {
        // Display the options to select XML files
        $xmlFiles = glob('xml/*.xml');
        echo '<form method="get" action="">';
        echo '<select name="xmlFile">';
        foreach ($xmlFiles as $file) {
            echo '<option value="' . $file . '">' . $file . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Display">';
        echo '</form>';
    }
?>
</body>

</html>