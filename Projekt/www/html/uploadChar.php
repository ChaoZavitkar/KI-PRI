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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Character Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4 text-center">Upload Character Sheet</h1>
        <form action="uploadChar.php" class="bg-white shadow-md p-4 rounded" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="xmlFile" class="block text-gray-700 font-bold mb-2">XML File:</label>
                <input type="file" id="xmlFile" name="xmlFile" accept=".xml" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Upload
            </button>
        </form>
    </div>
</body>

</html>