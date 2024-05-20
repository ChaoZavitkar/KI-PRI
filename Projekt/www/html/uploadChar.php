<form action="uploadChar.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="xmlFile" accept=".xml">
    <input type="submit" value="Upload">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xmlFile = $_FILES['xmlFile']['tmp_name'];
    $xsdFile = 'xml/characters.xsd';
    $xmlFilePath = 'xml/characters.xml';

    // Validate the XML file against the XSD schema
    $xmlValidator = new DOMDocument();
    $xmlValidator->loadXML(file_get_contents($xmlFile));
    libxml_use_internal_errors(true);
    if (!$xmlValidator->schemaValidate($xsdFile)) {
        $errors = libxml_get_errors();
        foreach ($errors as $error) {
            echo 'Error: ' . $error->message;
        }
        libxml_clear_errors();
    } else {
        // Append the new character to the characters.xml file
        $xmlData = new DOMDocument();
        $xmlData->load($xmlFile);
        $existingData = new DOMDocument();
        $existingData->load($xmlFilePath);

        foreach ($xmlData->getElementsByTagName('CharacterSheet') as $newCharacter) {
            $existingData->documentElement->appendChild($existingData->importNode($newCharacter, true));
        }

        $existingData->save($xmlFilePath);

        echo 'New character added to characters.xml.';
    }
}
?>