<?php
$xmlFilePath = 'characters.xml';

if (isset($_POST['index'])) {
    $index = intval($_POST['index']);

    $xmlData = new DOMDocument();
    $xmlData->load($xmlFilePath);

    $characterSheets = $xmlData->getElementsByTagName('CharacterSheet');

    // Check if the index is within the valid range
    if ($index >= 0 && $index < $characterSheets->length) {
        $characterSheet = $characterSheets->item($index);

        // Update character fields here
        // For example, if form inputs are sent with names like 'name', 'class', etc.
        $nameNode = $characterSheet->getElementsByTagName('Name')->item(0);
        $classNode = $characterSheet->getElementsByTagName('Class')->item(0);

        if ($nameNode && $classNode) {
            $nameNode->nodeValue = $_POST['name'];
            $classNode->nodeValue = $_POST['class'];
        }

        $xmlData->save($xmlFilePath);
        echo 'Character updated successfully.';
    } else {
        echo 'Invalid character index.';
    }
}
?>