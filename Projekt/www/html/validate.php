<?php
    function printErrors()
    { ?>
        <table>
            <?php foreach (libxml_get_errors() as $error) { ?>
                <tr>
                    <td>
                        <?= $error->line ?>
                    </td>
                    <td>
                        <?= $error->message ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
    }

    function validate($xmlPath, $xsdPath = '')
    {
        $doc = new DOMDocument;

        // proběhne kontrola well-formed
        libxml_use_internal_errors(true);
        $doc->loadXML(file_get_contents($xmlPath));
        printErrors();
        libxml_use_internal_errors(false);

        $isValid = false;
        // Máme XSD?
        if ($xsdPath) {
            echo '<p>Validuji podle XSD.';
            // validace
            libxml_use_internal_errors(true);
            $isValid = $doc->schemaValidate($xsdPath);
            printErrors();
            libxml_use_internal_errors(false);
        }

        return $isValid;
    }

    // poslané soubory
    $xmlFile = @$_FILES['xml'];
    $xsdFile = @$_FILES['xsd'];

    // Máme XML?
    if (@$xmlTmpName = $xmlFile['tmp_name']) {
        $xsdTmpName = $xsdFile['tmp_name'];
        $isValid = validate($xmlTmpName, $xsdTmpName);
        if ($isValid)
            echo "Nahraný XML soubor je validní.";
    }
    ?>