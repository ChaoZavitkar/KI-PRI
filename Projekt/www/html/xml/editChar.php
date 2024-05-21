<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Log POST data
    error_log(print_r($_POST, true));

    // Load XML file
    $xmlFilePath = 'characters.xml';
    if (!file_exists($xmlFilePath)) {
        die('XML file not found.');
    }

    $xmlData = simplexml_load_file($xmlFilePath);
    if ($xmlData === false) {
        die('Failed to load XML file.');
    }

    $index = $_POST['index'];
    $index = (int)$index; // Convert index to integer
    if (!isset($xmlData->CharacterSheet[$index])) {
        die('Invalid character index.'.$index);
    }

    $characterSheet = $xmlData->CharacterSheet[$index];

    // Update character fields here
    $fields = ['Name', 'Class', 'Level', 'Race', 'Background', 'Alignment', 'ExperiencePoints', 'ArmorClass', 'Initiative', 'Speed'];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            echo $_POST[$field]. '; ';
            $characterSheet->$field = $_POST[$field];
        }
    }

    // Save updated XML data
    $saved = $xmlData->asXML($xmlFilePath);
    if ($saved === false) {
        die('Failed to save XML file.');
    }

    echo 'Character updated successfully.'.$index;
} else {
    die('Invalid request method.');
}
?>
