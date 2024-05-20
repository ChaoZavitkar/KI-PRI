<!DOCTYPE html>
<html lang="cs">

<?php require __DIR__ . '/../include/predmety.php' ?>

<head>
    <meta charset="UTF-8">
</head>

<body>

<form method="post">
    <select name="name" placeholder="Název">
        <option value="">-- Select --</option>
        <?php
        echo "<option value='PGL1'>PLG1</option>";
        $xml = simplexml_load_file('../xml/studium.xml');
        if ($xml === false) {
            echo "Error loading XML file";
        } else {
            foreach ($xml->predmet as $predmet) {
                echo "<option value=\"{$predmet['kod']}\">{$predmet['nazev']}</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Hledat">
</form>

    <?= tabulkaPredmetu(isset($_POST['name']) ? $_POST['name'] : 'Předmět neexistuje') ?>

</body>

</html>