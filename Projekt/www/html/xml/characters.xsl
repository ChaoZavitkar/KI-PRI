<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    
    <xsl:template match="/">
        <html>
            <head>
                <title>Character Sheets</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .character { border: 1px solid #000; margin: 10px; padding: 10px; }
                    h2 { border-bottom: 1px solid #000; padding-bottom: 5px; }
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ddd; padding: 8px; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h1>Character Sheets</h1>
                <xsl:for-each select="CharacterSheets/CharacterSheet">
                    <div class="character">
                        <h2><xsl:value-of select="Name"/> - <xsl:value-of select="Class"/> (Level <xsl:value-of select="Level"/>)</h2>
                        <p><strong>Race:</strong> <xsl:value-of select="Race"/></p>
                        <p><strong>Background:</strong> <xsl:value-of select="Background"/></p>
                        <p><strong>Alignment:</strong> <xsl:value-of select="Alignment"/></p>
                        <p><strong>Experience Points:</strong> <xsl:value-of select="ExperiencePoints"/></p>
                        
                        <h3>Attributes</h3>
                        <table>
                            <tr>
                                <th>Strength</th>
                                <th>Dexterity</th>
                                <th>Constitution</th>
                                <th>Intelligence</th>
                                <th>Wisdom</th>
                                <th>Charisma</th>
                            </tr>
                            <tr>
                                <td><xsl:value-of select="Attributes/Strength"/></td>
                                <td><xsl:value-of select="Attributes/Dexterity"/></td>
                                <td><xsl:value-of select="Attributes/Constitution"/></td>
                                <td><xsl:value-of select="Attributes/Intelligence"/></td>
                                <td><xsl:value-of select="Attributes/Wisdom"/></td>
                                <td><xsl:value-of select="Attributes/Charisma"/></td>
                            </tr>
                        </table>
                        
                        <h3>Skills</h3>
                        <table>
                            <tr>
                                <th>Acrobatics</th>
                                <th>Animal Handling</th>
                                <th>Arcana</th>
                                <th>Athletics</th>
                                <th>Deception</th>
                                <th>History</th>
                                <th>Insight</th>
                                <th>Intimidation</th>
                                <th>Investigation</th>
                                <th>Medicine</th>
                                <th>Nature</th>
                                <th>Perception</th>
                                <th>Performance</th>
                                <th>Persuasion</th>
                                <th>Religion</th>
                                <th>Sleight of Hand</th>
                                <th>Stealth</th>
                                <th>Survival</th>
                            </tr>
                            <tr>
                                <td><xsl:value-of select="Skills/Acrobatics"/></td>
                                <td><xsl:value-of select="Skills/AnimalHandling"/></td>
                                <td><xsl:value-of select="Skills/Arcana"/></td>
                                <td><xsl:value-of select="Skills/Athletics"/></td>
                                <td><xsl:value-of select="Skills/Deception"/></td>
                                <td><xsl:value-of select="Skills/History"/></td>
                                <td><xsl:value-of select="Skills/Insight"/></td>
                                <td><xsl:value-of select="Skills/Intimidation"/></td>
                                <td><xsl:value-of select="Skills/Investigation"/></td>
                                <td><xsl:value-of select="Skills/Medicine"/></td>
                                <td><xsl:value-of select="Skills/Nature"/></td>
                                <td><xsl:value-of select="Skills/Perception"/></td>
                                <td><xsl:value-of select="Skills/Performance"/></td>
                                <td><xsl:value-of select="Skills/Persuasion"/></td>
                                <td><xsl:value-of select="Skills/Religion"/></td>
                                <td><xsl:value-of select="Skills/SleightOfHand"/></td>
                                <td><xsl:value-of select="Skills/Stealth"/></td>
                                <td><xsl:value-of select="Skills/Survival"/></td>
                            </tr>
                        </table>
                        
                        <h3>Saving Throws</h3>
                        <table>
                            <tr>
                                <th>Strength</th>
                                <th>Dexterity</th>
                                <th>Constitution</th>
                                <th>Intelligence</th>
                                <th>Wisdom</th>
                                <th>Charisma</th>
                            </tr>
                            <tr>
                                <td><xsl:value-of select="SavingThrows/StrengthSave"/></td>
                                <td><xsl:value-of select="SavingThrows/DexteritySave"/></td>
                                <td><xsl:value-of select="SavingThrows/ConstitutionSave"/></td>
                                <td><xsl:value-of select="SavingThrows/IntelligenceSave"/></td>
                                <td><xsl:value-of select="SavingThrows/WisdomSave"/></td>
                                <td><xsl:value-of select="SavingThrows/CharismaSave"/></td>
                            </tr>
                        </table>
                        
                        <h3>Hit Points</h3>
                        <p><strong>Maximum:</strong> <xsl:value-of select="HitPoints/Maximum"/></p>
                        <p><strong>Current:</strong> <xsl:value-of select="HitPoints/Current"/></p>
                        <xsl:if test="HitPoints/Temporary != 0">
                            <p><strong>Temporary:</strong> <xsl:value-of select="HitPoints/Temporary"/></p>
                        </xsl:if>
                        
                        <h3>Other Stats</h3>
                        <p><strong>Armor Class:</strong> <xsl:value-of select="ArmorClass"/></p>
                        <p><strong>Initiative:</strong> <xsl:value-of select="Initiative"/></p>
                        <p><strong>Speed:</strong> <xsl:value-of select="Speed"/> ft</p>
                        
                        <h3>Equipment</h3>
                        <table>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                            </tr>
                            <xsl:for-each select="Equipment/Item">
                                <tr>
                                    <td><xsl:value-of select="Name"/></td>
                                    <td><xsl:value-of select="Quantity"/></td>
                                </tr>
                            </xsl:for-each>
                        </table>
                        
                        <h3>Spells</h3>
                        <table>
                            <tr>
                                <th>Spell Name</th>
                                <th>Level</th>
                                <th>Prepared</th>
                            </tr>
                            <xsl:for-each select="Spells/Spell">
                                <tr>
                                    <td><xsl:value-of select="Name"/></td>
                                    <td><xsl:value-of select="Level"/></td>
                                    <td>
                                        <xsl:choose>
                                            <xsl:when test="Prepared = 'true'">Yes</xsl:when>
                                            <xsl:otherwise>No</xsl:otherwise>
                                        </xsl:choose>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </table>
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
