<?php
$xmlFilePath = 'xml/characters.xml';

if (isset($_POST['index'])) {
    $index = intval($_POST['index']) - 1;

    $xmlData = new DOMDocument();
    $xmlData->load($xmlFilePath);
    
    $characterSheets = $xmlData->getElementsByTagName('CharacterSheet');
    if ($characterSheets->length > $index) {
        $characterSheet = $characterSheets->item($index);
    
        // Update character fields here
        // For example, if form inputs are sent with names like 'name', 'class', etc.
        $nameNode = $xmlData->getElementsByTagName('Name')->item(0);
        $classNode = $xmlData->getElementsByTagName('Class')->item(0);
    
        if ($nameNode && $classNode) {
            $nameNode->nodeValue = $_POST['name'];
            $classNode->nodeValue = $_POST['class'];
        }
    
        $xmlData->save($xmlFilePath);
        echo 'Character updated successfully.';
    } else {
        echo 'Character not found.';
    }
}
?>
