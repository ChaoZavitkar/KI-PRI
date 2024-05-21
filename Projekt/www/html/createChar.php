<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Character Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <style>
        fieldset {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <script>
        function createCharacter() {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            fetch('createChar.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // You can handle the response as needed
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
</head>

<body class="bg-gray-100">
    <?php
    $xmlFilePath = 'xml/characters.xml';

    $xmlData = new DOMDocument();
    $xmlData->load($xmlFilePath);

    if (isset($_POST['name'])) {
        $characterSheet = $xmlData->createElement('CharacterSheet');
        $xmlData->documentElement->appendChild($characterSheet);

        $name = $xmlData->createElement('Name', $_POST['name']);
        $characterSheet->appendChild($name);

        $class = $xmlData->createElement('Class', $_POST['class']);
        $characterSheet->appendChild($class);

        $level = $xmlData->createElement('Level', $_POST['level']);
        $characterSheet->appendChild($level);

        $race = $xmlData->createElement('Race', $_POST['race']);
        $characterSheet->appendChild($race);

        $background = $xmlData->createElement('Background', $_POST['background']);
        $characterSheet->appendChild($background);

        $alignment = $xmlData->createElement('Alignment', $_POST['alignment']);
        $characterSheet->appendChild($alignment);

        $experience = $xmlData->createElement('ExperiencePoints', $_POST['experience']);
        $characterSheet->appendChild($experience);

        $attributes = $xmlData->createElement('Attributes');
        $characterSheet->appendChild($attributes);
        $attributes->appendChild($xmlData->createElement('Strength', $_POST['strength']));
        $attributes->appendChild($xmlData->createElement('Dexterity', $_POST['dexterity']));
        $attributes->appendChild($xmlData->createElement('Constitution', $_POST['constitution']));
        $attributes->appendChild($xmlData->createElement('Intelligence', $_POST['intelligence']));
        $attributes->appendChild($xmlData->createElement('Wisdom', $_POST['wisdom']));
        $attributes->appendChild($xmlData->createElement('Charisma', $_POST['charisma']));

        $skills = $xmlData->createElement('Skills');
        $characterSheet->appendChild($skills);
        $skills->appendChild($xmlData->createElement('Acrobatics', $_POST['acrobatics']));
        $skills->appendChild($xmlData->createElement('AnimalHandling', $_POST['animalHandling']));
        $skills->appendChild($xmlData->createElement('Arcana', $_POST['arcana']));
        $skills->appendChild($xmlData->createElement('Athletics', $_POST['athletics']));
        $skills->appendChild($xmlData->createElement('Deception', $_POST['deception']));
        $skills->appendChild($xmlData->createElement('History', $_POST['history']));
        $skills->appendChild($xmlData->createElement('Insight', $_POST['insight']));
        $skills->appendChild($xmlData->createElement('Intimidation', $_POST['intimidation']));
        $skills->appendChild($xmlData->createElement('Investigation', $_POST['investigation']));
        $skills->appendChild($xmlData->createElement('Medicine', $_POST['medicine']));
        $skills->appendChild($xmlData->createElement('Nature', $_POST['nature']));
        $skills->appendChild($xmlData->createElement('Perception', $_POST['perception']));
        $skills->appendChild($xmlData->createElement('Performance', $_POST['performance']));
        $skills->appendChild($xmlData->createElement('Persuasion', $_POST['persuasion']));
        $skills->appendChild($xmlData->createElement('Religion', $_POST['religion']));
        $skills->appendChild($xmlData->createElement('SleightOfHand', $_POST['sleightOfHand']));
        $skills->appendChild($xmlData->createElement('Stealth', $_POST['stealth']));
        $skills->appendChild($xmlData->createElement('Survival', $_POST['survival']));

        $savingThrows = $xmlData->createElement('SavingThrows');
        $characterSheet->appendChild($savingThrows);
        $savingThrows->appendChild($xmlData->createElement('StrengthSave', $_POST['strengthSave']));
        $savingThrows->appendChild($xmlData->createElement('DexteritySave', $_POST['dexteritySave']));
        $savingThrows->appendChild($xmlData->createElement('ConstitutionSave', $_POST['constitutionSave']));
        $savingThrows->appendChild($xmlData->createElement('IntelligenceSave', $_POST['intelligenceSave']));
        $savingThrows->appendChild($xmlData->createElement('WisdomSave', $_POST['wisdomSave']));
        $savingThrows->appendChild($xmlData->createElement('CharismaSave', $_POST['charismaSave']));

        $hitPoints = $xmlData->createElement('HitPoints');
        $characterSheet->appendChild($hitPoints);
        $hitPoints->appendChild($xmlData->createElement('Maximum', $_POST['maxHP']));
        $hitPoints->appendChild($xmlData->createElement('Current', $_POST['currentHP']));
        if (isset($_POST['tempHP']) && $_POST['tempHP'] !== '') {
            $hitPoints->appendChild($xmlData->createElement('Temporary', $_POST['tempHP']));
        }

        $armorClass = $xmlData->createElement('ArmorClass', $_POST['armorClass']);
        $characterSheet->appendChild($armorClass);

        $initiative = $xmlData->createElement('Initiative', $_POST['initiative']);
        $characterSheet->appendChild($initiative);

        $speed = $xmlData->createElement('Speed', $_POST['speed']);
        $characterSheet->appendChild($speed);

        $equipment = $xmlData->createElement('Equipment');
        $characterSheet->appendChild($equipment);

        $i = 1;
        while (isset($_POST["itemName$i"])) {
            $item = $xmlData->createElement('Item');
            $item->appendChild($xmlData->createElement('Name', $_POST["itemName$i"]));
            $item->appendChild($xmlData->createElement('Quantity', $_POST["itemQuantity$i"]));
            $equipment->appendChild($item);
            $i++;
        }

        $spells = $xmlData->createElement('Spells');
        $characterSheet->appendChild($spells);

        $i = 1;
        while (isset($_POST["spellName$i"])) {
            $spell = $xmlData->createElement('Spell');
            $spell->appendChild($xmlData->createElement('Name', $_POST["spellName$i"]));
            $spell->appendChild($xmlData->createElement('Level', $_POST["spellLevel$i"]));
            $spell->appendChild($xmlData->createElement('Prepared', $_POST["spellPrepared$i"] === 'on' ? 'true' : 'false'));
            $spells->appendChild($spell);
            $i++;
        }

        $xmlData->save($xmlFilePath);

        echo 'New character added to characters.xml.';
    } else {
        echo 'Form data is missing the "name" field.';
    }
    ?>

    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4 text-center">Create Character Sheet</h1>
        <form class="bg-white shadow-md p-4 rounded" method="post" action="createChar.php">
            <!-- Add form fields here, e.g., Name, Class, Level, Race, Background, Alignment, etc. -->
            <div class="section">
                <h2 class="section-header">Character Info</h2>
                <fieldset>
                    <legend>Character Information</legend>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="class">Class:</label>
                    <input type="text" id="class" name="class" required><br>

                    <label for="level">Level:</label>
                    <input type="number" id="level" name="level" required><br>

                    <label for="race">Race:</label>
                    <input type="text" id="race" name="race" required><br>

                    <label for="background">Background:</label>
                    <input type="text" id="background" name="background" required><br>

                    <label for="alignment">Alignment:</label>
                    <input type="text" id="alignment" name="alignment" required><br>

                    <label for="experience">Experience Points:</label>
                    <input type="number" id="experience" name="experience" required><br>
                </fieldset>

                <fieldset>
                    <legend>Attributes</legend>
                    <label for="strength">Strength:</label>
                    <input type="number" id="strength" name="strength" required><br>

                    <label for="dexterity">Dexterity:</label>
                    <input type="number" id="dexterity" name="dexterity" required><br>

                    <label for="constitution">Constitution:</label>
                    <input type="number" id="constitution" name="constitution" required><br>

                    <label for="intelligence">Intelligence:</label>
                    <input type="number" id="intelligence" name="intelligence" required><br>

                    <label for="wisdom">Wisdom:</label>
                    <input type="number" id="wisdom" name="wisdom" required><br>

                    <label for="charisma">Charisma:</label>
                    <input type="number" id="charisma" name="charisma" required><br>
                </fieldset>

                <fieldset>
                    <legend>Skills</legend>
                    <label for="acrobatics">Acrobatics:</label>
                    <input type="number" id="acrobatics" name="acrobatics" required><br>

                    <label for="animalHandling">Animal Handling:</label>
                    <input type="number" id="animalHandling" name="animalHandling" required><br>

                    <label for="arcana">Arcana:</label>
                    <input type="number" id="arcana" name="arcana" required><br>

                    <label for="athletics">Athletics:</label>
                    <input type="number" id="athletics" name="athletics" required><br>

                    <label for="deception">Deception:</label>
                    <input type="number" id="deception" name="deception" required><br>

                    <label for="history">History:</label>
                    <input type="number" id="history" name="history" required><br>

                    <label for="insight">Insight:</label>
                    <input type="number" id="insight" name="insight" required><br>

                    <label for="intimidation">Intimidation:</label>
                    <input type="number" id="intimidation" name="intimidation" required><br>

                    <label for="investigation">Investigation:</label>
                    <input type="number" id="investigation" name="investigation" required><br>

                    <label for="medicine">Medicine:</label>
                    <input type="number" id="medicine" name="medicine" required><br>

                    <label for="nature">Nature:</label>
                    <input type="number" id="nature" name="nature" required><br>

                    <label for="perception">Perception:</label>
                    <input type="number" id="perception" name="perception" required><br>

                    <label for="performance">Performance:</label>
                    <input type="number" id="performance" name="performance" required><br>

                    <label for="persuasion">Persuasion:</label>
                    <input type="number" id="persuasion" name="persuasion" required><br>

                    <label for="religion">Religion:</label>
                    <input type="number" id="religion" name="religion" required><br>

                    <label for="sleightOfHand">Sleight of Hand:</label>
                    <input type="number" id="sleightOfHand" name="sleightOfHand" required><br>

                    <label for="stealth">Stealth:</label>
                    <input type="number" id="stealth" name="stealth" required><br>

                    <label for="survival">Survival:</label>
                    <input type="number" id="survival" name="survival" required><br>
                </fieldset>


                <fieldset>
                    <legend>Saving Throws</legend>
                    <label for="strengthSave">Strength Save:</label>
                    <input type="number" id="strengthSave" name="strengthSave" required><br>

                    <label for="dexteritySave">Dexterity Save:</label>
                    <input type="number" id="dexteritySave" name="dexteritySave" required><br>

                    <label for="constitutionSave">Constitution Save:</label>
                    <input type="number" id="constitutionSave" name="constitutionSave" required><br>

                    <label for="intelligenceSave">Intelligence Save:</label>
                    <input type="number" id="intelligenceSave" name="intelligenceSave" required><br>

                    <label for="wisdomSave">Wisdom Save:</label>
                    <input type="number" id="wisdomSave" name="wisdomSave" required><br>

                    <label for="charismaSave">Charisma Save:</label>
                    <input type="number" id="charismaSave" name="charismaSave" required><br>
                </fieldset>

                <fieldset>
                    <legend>Hit Points</legend>
                    <label for="maxHP">Maximum HP:</label>
                    <input type="number" id="maxHP" name="maxHP" required><br>

                    <label for="currentHP">Current HP:</label>
                    <input type="number" id="currentHP" name="currentHP" required><br>

                    <label for="tempHP">Temporary HP:</label>
                    <input type="number" id="tempHP" name="tempHP"><br>
                </fieldset>


                <fieldset>
                    <legend>Armor Class</legend>
                    <label for="armorClass">Armor Class:</label>
                    <input type="number" id="armorClass" name="armorClass" required><br>
                </fieldset>

                <fieldset>
                    <legend>Initiative</legend>
                    <label for="initiative">Initiative:</label>
                    <input type="number" id="initiative" name="initiative" required><br>
                </fieldset>

                <fieldset>
                    <legend>Speed</legend>
                    <label for="speed">Speed:</label>
                    <input type="number" id="speed" name="speed" required><br>
                </fieldset>

                <fieldset>
                    <legend>Equipment</legend>
                    <div id="equipment">
                        <div class="item">
                            <label for="itemName1">Item Name:</label>
                            <input type="text" id="itemName1" name="itemName1" required>
                            <label for="itemQuantity1">Quantity:</label>
                            <input type="number" id="itemQuantity1" name="itemQuantity1" required>
                        </div>
                    </div>
                    <button type="button" onclick="addEquipment()">Add Item</button>
                </fieldset>

                <script>
                    let equipmentCount = 1;

                    function addEquipment() {
                        equipmentCount++;
                        const newItem = document.createElement('div');
                        newItem.classList.add('item');
                        newItem.innerHTML = `
            <label for="itemName${equipmentCount}">Item Name:</label>
            <input type="text" id="itemName${equipmentCount}" name="itemName${equipmentCount}" required>
            <label for="itemQuantity${equipmentCount}">Quantity:</label>
            <input type="number" id="itemQuantity${equipmentCount}" name="itemQuantity${equipmentCount}" required>
        `;
                        document.getElementById('equipment').appendChild(newItem);
                    }
                </script>

                <fieldset>
                    <legend>Spells</legend>
                    <div id="spells">
                        <div class="spell">
                            <label for="spellName1">Spell Name:</label>
                            <input type="text" id="spellName1" name="spellName1" required>
                            <label for="spellLevel1">Level:</label>
                            <input type="number" id="spellLevel1" name="spellLevel1" required>
                            <label for="spellPrepared1">Prepared:</label>
                            <input type="checkbox" id="spellPrepared1" name="spellPrepared1">
                        </div>
                    </div>
                    <button type="button" onclick="addSpell()">Add Spell</button>
                </fieldset>

                <script>
                    let spellCount = 1;

                    function addSpell() {
                        spellCount++;
                        const newSpell = document.createElement('div');
                        newSpell.classList.add('spell');
                        newSpell.innerHTML = `
            <label for="spellName${spellCount}">Spell Name:</label>
            <input type="text" id="spellName${spellCount}" name="spellName${spellCount}" required>
            <label for="spellLevel${spellCount}">Level:</label>
            <input type="number" id="spellLevel${spellCount}" name="spellLevel${spellCount}" required>
            <label for="spellPrepared${spellCount}">Prepared:</label>
            <input type="checkbox" id="spellPrepared${spellCount}" name="spellPrepared${spellCount}">
        `;
                        document.getElementById('spells').appendChild(newSpell);
                    }
                </script>
                <!-- Add other fields for Class, Level, Race, Background, Alignment, etc. -->
            </div>
            <!-- Add other sections for Attributes, Skills, Saving Throws, Hit Points, Other Stats, Equipment, and Spells -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Vytvořit charakter
            </button>
        </form>
    </div>

    <!-- <h1>Character Creator</h1>
    <form action="createChar.php" method="post">
        <fieldset>
            <legend>Character Information</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="class">Class:</label>
            <input type="text" id="class" name="class" required><br>

            <label for="level">Level:</label>
            <input type="number" id="level" name="level" required><br>

            <label for="race">Race:</label>
            <input type="text" id="race" name="race" required><br>

            <label for="background">Background:</label>
            <input type="text" id="background" name="background" required><br>

            <label for="alignment">Alignment:</label>
            <input type="text" id="alignment" name="alignment" required><br>

            <label for="experience">Experience Points:</label>
            <input type="number" id="experience" name="experience" required><br>
        </fieldset>

        <fieldset>
            <legend>Attributes</legend>
            <label for="strength">Strength:</label>
            <input type="number" id="strength" name="strength" required><br>

            <label for="dexterity">Dexterity:</label>
            <input type="number" id="dexterity" name="dexterity" required><br>

            <label for="constitution">Constitution:</label>
            <input type="number" id="constitution" name="constitution" required><br>

            <label for="intelligence">Intelligence:</label>
            <input type="number" id="intelligence" name="intelligence" required><br>

            <label for="wisdom">Wisdom:</label>
            <input type="number" id="wisdom" name="wisdom" required><br>

            <label for="charisma">Charisma:</label>
            <input type="number" id="charisma" name="charisma" required><br>
        </fieldset>

        <fieldset>
            <legend>Skills</legend>
            <label for="acrobatics">Acrobatics:</label>
            <input type="number" id="acrobatics" name="acrobatics" required><br>

            <label for="animalHandling">Animal Handling:</label>
            <input type="number" id="animalHandling" name="animalHandling" required><br>

            <label for="arcana">Arcana:</label>
            <input type="number" id="arcana" name="arcana" required><br>

            <label for="athletics">Athletics:</label>
            <input type="number" id="athletics" name="athletics" required><br>

            <label for="deception">Deception:</label>
            <input type="number" id="deception" name="deception" required><br>

            <label for="history">History:</label>
            <input type="number" id="history" name="history" required><br>

            <label for="insight">Insight:</label>
            <input type="number" id="insight" name="insight" required><br>

            <label for="intimidation">Intimidation:</label>
            <input type="number" id="intimidation" name="intimidation" required><br>

            <label for="investigation">Investigation:</label>
            <input type="number" id="investigation" name="investigation" required><br>

            <label for="medicine">Medicine:</label>
            <input type="number" id="medicine" name="medicine" required><br>

            <label for="nature">Nature:</label>
            <input type="number" id="nature" name="nature" required><br>

            <label for="perception">Perception:</label>
            <input type="number" id="perception" name="perception" required><br>

            <label for="performance">Performance:</label>
            <input type="number" id="performance" name="performance" required><br>

            <label for="persuasion">Persuasion:</label>
            <input type="number" id="persuasion" name="persuasion" required><br>

            <label for="religion">Religion:</label>
            <input type="number" id="religion" name="religion" required><br>

            <label for="sleightOfHand">Sleight of Hand:</label>
            <input type="number" id="sleightOfHand" name="sleightOfHand" required><br>

            <label for="stealth">Stealth:</label>
            <input type="number" id="stealth" name="stealth" required><br>

            <label for="survival">Survival:</label>
            <input type="number" id="survival" name="survival" required><br>
        </fieldset>


        <fieldset>
            <legend>Saving Throws</legend>
            <label for="strengthSave">Strength Save:</label>
            <input type="number" id="strengthSave" name="strengthSave" required><br>

            <label for="dexteritySave">Dexterity Save:</label>
            <input type="number" id="dexteritySave" name="dexteritySave" required><br>

            <label for="constitutionSave">Constitution Save:</label>
            <input type="number" id="constitutionSave" name="constitutionSave" required><br>

            <label for="intelligenceSave">Intelligence Save:</label>
            <input type="number" id="intelligenceSave" name="intelligenceSave" required><br>

            <label for="wisdomSave">Wisdom Save:</label>
            <input type="number" id="wisdomSave" name="wisdomSave" required><br>

            <label for="charismaSave">Charisma Save:</label>
            <input type="number" id="charismaSave" name="charismaSave" required><br>
        </fieldset>

        <fieldset>
            <legend>Hit Points</legend>
            <label for="maxHP">Maximum HP:</label>
            <input type="number" id="maxHP" name="maxHP" required><br>

            <label for="currentHP">Current HP:</label>
            <input type="number" id="currentHP" name="currentHP" required><br>

            <label for="tempHP">Temporary HP:</label>
            <input type="number" id="tempHP" name="tempHP"><br>
        </fieldset>


        <fieldset>
            <legend>Armor Class</legend>
            <label for="armorClass">Armor Class:</label>
            <input type="number" id="armorClass" name="armorClass" required><br>
        </fieldset>

        <fieldset>
            <legend>Initiative</legend>
            <label for="initiative">Initiative:</label>
            <input type="number" id="initiative" name="initiative" required><br>
        </fieldset>

        <fieldset>
            <legend>Speed</legend>
            <label for="speed">Speed:</label>
            <input type="number" id="speed" name="speed" required><br>
        </fieldset>

        <fieldset>
            <legend>Equipment</legend>
            <div id="equipment">
                <div class="item">
                    <label for="itemName1">Item Name:</label>
                    <input type="text" id="itemName1" name="itemName1" required>
                    <label for="itemQuantity1">Quantity:</label>
                    <input type="number" id="itemQuantity1" name="itemQuantity1" required>
                </div>
            </div>
            <button type="button" onclick="addEquipment()">Add Item</button>
        </fieldset>

        <script>
            let equipmentCount = 1;

            function addEquipment() {
                equipmentCount++;
                const newItem = document.createElement('div');
                newItem.classList.add('item');
                newItem.innerHTML = `
            <label for="itemName${equipmentCount}">Item Name:</label>
            <input type="text" id="itemName${equipmentCount}" name="itemName${equipmentCount}" required>
            <label for="itemQuantity${equipmentCount}">Quantity:</label>
            <input type="number" id="itemQuantity${equipmentCount}" name="itemQuantity${equipmentCount}" required>
        `;
                document.getElementById('equipment').appendChild(newItem);
            }
        </script>

        <fieldset>
            <legend>Spells</legend>
            <div id="spells">
                <div class="spell">
                    <label for="spellName1">Spell Name:</label>
                    <input type="text" id="spellName1" name="spellName1" required>
                    <label for="spellLevel1">Level:</label>
                    <input type="number" id="spellLevel1" name="spellLevel1" required>
                    <label for="spellPrepared1">Prepared:</label>
                    <input type="checkbox" id="spellPrepared1" name="spellPrepared1">
                </div>
            </div>
            <button type="button" onclick="addSpell()">Add Spell</button>
        </fieldset>

        <script>
            let spellCount = 1;

            function addSpell() {
                spellCount++;
                const newSpell = document.createElement('div');
                newSpell.classList.add('spell');
                newSpell.innerHTML = `
            <label for="spellName${spellCount}">Spell Name:</label>
            <input type="text" id="spellName${spellCount}" name="spellName${spellCount}" required>
            <label for="spellLevel${spellCount}">Level:</label>
            <input type="number" id="spellLevel${spellCount}" name="spellLevel${spellCount}" required>
            <label for="spellPrepared${spellCount}">Prepared:</label>
            <input type="checkbox" id="spellPrepared${spellCount}" name="spellPrepared${spellCount}">
        `;
                document.getElementById('spells').appendChild(newSpell);
            }
        </script> -->

        <!-- <input type="submit" value="Create Character"> -->
    </form>
</body>

</html>