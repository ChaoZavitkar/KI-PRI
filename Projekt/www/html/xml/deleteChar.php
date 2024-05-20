<?php
$xmlFilePath = 'characters.xml';

if (isset($_POST['index'])) {
    $index = intval($_POST['index']) - 1;

    $xmlData = new DOMDocument();
    $xmlData->load($xmlFilePath);

    $characterSheets = $xmlData->getElementsByTagName('CharacterSheet');
    if ($characterSheets->length > $index) {
        $characterSheet = $characterSheets->item($index);
        $characterSheet->parentNode->removeChild($characterSheet);

        $xmlData->save($xmlFilePath);
        // $dom = new DOMDocument();
        // $dom->load($xmlFilePath);
        echo 'Character deleted successfully.';
    } else {
        echo 'Character not found.';
    }
} else {
    echo 'Index not provided.';
}
?>
