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
        $selectedXml = new DOMDocument;
        $selectedXml->load($_GET['xmlFile']);

        // XSL
        $xsl = new DOMDocument;
        $xsl->load('xml/student.xsl');

        // transformer
        $xslt = new XSLTProcessor();
        $xslt->importStylesheet($xsl);
        $transformedXml = $xslt->transformToXml($selectedXml);

        // output
        echo $transformedXml;
    }
?>
</body>

</html>