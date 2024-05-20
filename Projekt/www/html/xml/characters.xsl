<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" indent="yes" />

    <!-- Template to match the root element -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Character Sheets</title>
                <style>
                    /* Basic styling for the form */
                    table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        padding: 5px;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
                <script src="edit_delete.js"></script>
            </head>
            <body>
                <h1>Character Sheets</h1>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>Race</th>
                        <th>Background</th>
                        <th>Alignment</th>
                        <th>Experience Points</th>
                        <th>Attributes</th>
                        <th>Skills</th>
                        <th>Saving Throws</th>
                        <th>Hit Points</th>
                        <th>Armor Class</th>
                        <th>Initiative</th>
                        <th>Speed</th>
                        <th>Equipment</th>
                        <th>Spells</th>
                        <th>Actions</th>
                    </tr>
                    <xsl:for-each select="CharacterSheets/CharacterSheet">
                        <tr>
                            <xsl:variable name="index" select="position()" />
                            <td><xsl:value-of select="Name" /></td>
                            <td><xsl:value-of select="Class" /></td>
                            <td><xsl:value-of select="Level" /></td>
                            <td><xsl:value-of select="Race" /></td>
                            <td><xsl:value-of select="Background" /></td>
                            <td><xsl:value-of select="Alignment" /></td>
                            <td><xsl:value-of select="ExperiencePoints" /></td>
                            <td>
                                <xsl:value-of select="Attributes/Strength" />, 
                                <xsl:value-of select="Attributes/Dexterity" />, 
                                <xsl:value-of select="Attributes/Constitution" />, 
                                <xsl:value-of select="Attributes/Intelligence" />, 
                                <xsl:value-of select="Attributes/Wisdom" />, 
                                <xsl:value-of select="Attributes/Charisma" />
                            </td>
                            <td>
                                <xsl:value-of select="Skills/Acrobatics" />, 
                                <xsl:value-of select="Skills/AnimalHandling" />, 
                                <xsl:value-of select="Skills/Arcana" />, 
                                <xsl:value-of select="Skills/Athletics" />, 
                                <xsl:value-of select="Skills/Deception" />, 
                                <xsl:value-of select="Skills/History" />, 
                                <xsl:value-of select="Skills/Insight" />, 
                                <xsl:value-of select="Skills/Intimidation" />, 
                                <xsl:value-of select="Skills/Investigation" />, 
                                <xsl:value-of select="Skills/Medicine" />, 
                                <xsl:value-of select="Skills/Nature" />, 
                                <xsl:value-of select="Skills/Perception" />, 
                                <xsl:value-of select="Skills/Performance" />, 
                                <xsl:value-of select="Skills/Persuasion" />, 
                                <xsl:value-of select="Skills/Religion" />, 
                                <xsl:value-of select="Skills/SleightOfHand" />, 
                                <xsl:value-of select="Skills/Stealth" />, 
                                <xsl:value-of select="Skills/Survival" />
                            </td>
                            <td>
                                <xsl:value-of select="SavingThrows/StrengthSave" />, 
                                <xsl:value-of select="SavingThrows/DexteritySave" />, 
                                <xsl:value-of select="SavingThrows/ConstitutionSave" />, 
                                <xsl:value-of select="SavingThrows/IntelligenceSave" />, 
                                <xsl:value-of select="SavingThrows/WisdomSave" />, 
                                <xsl:value-of select="SavingThrows/CharismaSave" />
                            </td>
                            <td>
                                <xsl:value-of select="HitPoints/Maximum" />, 
                                <xsl:value-of select="HitPoints/Current" />, 
                                <xsl:value-of select="HitPoints/Temporary" />
                            </td>
                            <td><xsl:value-of select="ArmorClass" /></td>
                            <td><xsl:value-of select="Initiative" /></td>
                            <td><xsl:value-of select="Speed" /></td>
                            <td>
                                <xsl:for-each select="Equipment/Item">
                                    <xsl:value-of select="Name" /> (<xsl:value-of select="Quantity" />), 
                                </xsl:for-each>
                            </td>
                            <td>
                                <xsl:for-each select="Spells/Spell">
                                    <xsl:value-of select="Name" /> (Level: <xsl:value-of select="Level" />, Prepared: <xsl:value-of select="Prepared" />), 
                                </xsl:for-each>
                            </td>
                            <td>
                                <form id="deleteForm{$index}" method="post" action="deleteChar.php" style="display:inline;">
                                    <input type="hidden" name="index" value="{$index}" />
                                    <button type="button" onclick="deleteCharacter({$index})">Delete</button>
                                </form>
                                <form id="editForm{$index}" method="post" action="editChar.php" style="display:inline;">
                                    <input type="hidden" name="index" value="{$index}" />
                                    <button type="button" onclick="editCharacter({$index})">Edit</button>
                                    <button type="submit" style="display:none;">Save</button>
                                </form>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
