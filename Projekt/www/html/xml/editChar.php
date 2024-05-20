<?php
$xmlFilePath = 'characters.xml';

if (isset($_POST['index'])) {
    $index = intval($_POST['index']);
    echo 'Index received: ' . $index . '<br>'; // Debug statement

    if (file_exists($xmlFilePath)) {
        echo 'XML file found.<br>'; // Debug statement

        // Load XML file
        $xmlData = simplexml_load_file($xmlFilePath);

        // Check if character sheet exists at the given index
        if (isset($xmlData->CharacterSheet[$index])) {
            echo 'Valid character index.<br>'; // Debug statement

            // Update character fields here
            $characterSheet = $xmlData->CharacterSheet[$index];
            $fields = ['name' => 'Name', 'class' => 'Class', 'level' => 'Level', 'race' => 'Race', 'background' => 'Background', 'alignment' => 'Alignment', 'experiencePoints' => 'ExperiencePoints', 'armorClass' => 'ArmorClass', 'initiative' => 'Initiative', 'speed' => 'Speed'];

            foreach ($fields as $postField => $xmlField) {
                if (isset($_POST[$postField])) {
                    $characterSheet->$xmlField = $_POST[$postField];
                    echo 'Updated ' . $xmlField . ' with value: ' . $_POST[$postField] . '<br>'; // Debug statement
                }
            }

            // Save XML data back to the file
            $saved = $xmlData->asXML($xmlFilePath);
            if ($saved !== false) {
                echo 'Character updated successfully.';
            } else {
                echo 'Failed to save changes to XML file.';
            }
        } else {
            echo 'Invalid character index.';
        }
    } else {
        echo 'XML file not found.';
    }
} else {
    echo 'No character index specified.';
}
?>
