<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" indent="yes" />
    <xsl:template match="/">
        <html>
            <head>
                <title>Character Sheets</title>
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
                    rel="stylesheet" />
                <link
                    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
                    rel="stylesheet" />
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
                <style>
                    /* Add some custom styles to make it look like a DnD character sheet */
                    body {
                    background-color: #f0f0f0;
                    font-family: "Times New Roman", serif;
                    }
                    .character-sheet {
                    width: 800px;
                    margin: 40px auto;
                    padding: 20px;
                    background-color: #fff;
                    border: 1px solid #ddd;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .section {
                    margin-bottom: 20px;
                    }
                    .section-header {
                    font-size: 18px;
                    font-weight: bold;
                    margin-bottom: 10px;
                    }
                    .attribute {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 10px;
                    }
                    .attribute-label {
                    font-weight: bold;
                    }
                    .skill {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 10px;
                    }
                    .skill-label {
                    font-weight: bold;
                    }
                    .slick-slider {
                    width: 800px;
                    margin: 40px auto;
                    }
                    .slick-slide {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 500px;
                    }
                    .character-sheet-container {
                    height: 500px; /* or any other fixed height */
                    overflow-y: auto;
                    overflow-x: hidden;
                    }

                    .character-sheet-container::-webkit-scrollbar {
                    width: 0;
                    height: 0;
                    }

                    .character-sheet-container::-webkit-scrollbar-thumb {
                    background-color: transparent;
                    }
                    .hidden-input {
                    display: none;
                    }
                    .slick-dots {
                    display: flex;
                    justify-content: center;
                    }

                    .slick-dots li {
                    margin-right: 10px;
                    }

                    .slick-dots li button:before {
                    font-size: 16px;
                    line-height: 20px;
                    }
                </style>
                <script>
                    $(document).ready(function() {
                    $('.slick-slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true
                    });
                    });
                </script>
            </head>
            <body>
                <h1 class="text-2xl font-bold mb-4">Character Sheets</h1>
                <div class="slick-slider">
                    <xsl:for-each select="CharacterSheets/CharacterSheet">
                        <xsl:variable name="index" select="position()" />
                        <div class="slick-slide">
                            <div class="character-sheet-container">
                                <div class="character-sheet">
                                    <div class="section">
                                        <h2 class="section-header">Character Info</h2>
                                        <div class="attribute">
                                            <span class="attribute-label">Name:</span>
                                            <xsl:value-of select="Name" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Class:</span>
                                            <xsl:value-of select="Class" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Level:</span>
                                            <xsl:value-of select="Level" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Race:</span>
                                            <xsl:value-of select="Race" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Background:</span>
                                            <xsl:value-of select="Background" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Alignment:</span>
                                            <xsl:value-of select="Alignment" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Attributes</h2>
                                        <div class="attribute">
                                            <span class="attribute-label">Strength:</span>
                                            <xsl:value-of select="Attributes/Strength" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Dexterity:</span>
                                            <xsl:value-of select="Attributes/Dexterity" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Constitution:</span>
                                            <xsl:value-of select="Attributes/Constitution" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Intelligence:</span>
                                            <xsl:value-of select="Attributes/Intelligence" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Wisdom:</span>
                                            <xsl:value-of select="Attributes/Wisdom" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Charisma:</span>
                                            <xsl:value-of select="Attributes/Charisma" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Skills</h2>
                                        <div class="skill">
                                            <span class="skill-label">Acrobatics:</span>
                                            <xsl:value-of select="Skills/Acrobatics" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Animal Handling:</span>
                                            <xsl:value-of select="Skills/AnimalHandling" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Arcana:</span>
                                            <xsl:value-of select="Skills/Arcana" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Athletics:</span>
                                            <xsl:value-of select="Skills/Athletics" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Deception:</span>
                                            <xsl:value-of select="Skills/Deception" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">History:</span>
                                            <xsl:value-of select="Skills/History" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Insight:</span>
                                            <xsl:value-of select="Skills/Insight" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Intimidation:</span>
                                            <xsl:value-of select="Skills/Intimidation" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Investigation:</span>
                                            <xsl:value-of select="Skills/Investigation" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Medicine:</span>
                                            <xsl:value-of select="Skills/Medicine" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Nature:</span>
                                            <xsl:value-of select="Skills/Nature" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Perception:</span>
                                            <xsl:value-of select="Skills/Perception" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Performance:</span>
                                            <xsl:value-of select="Skills/Performance" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Persuasion:</span>
                                            <xsl:value-of select="Skills/Persuasion" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Religion:</span>
                                            <xsl:value-of select="Skills/Religion" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Sleight of Hand:</span>
                                            <xsl:value-of select="Skills/SleightOfHand" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Stealth:</span>
                                            <xsl:value-of select="Skills/Stealth" />
                                        </div>
                                        <div class="skill">
                                            <span class="skill-label">Survival:</span>
                                            <xsl:value-of select="Skills/Survival" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Saving Throws</h2>
                                        <div class="attribute">
                                            <span class="attribute-label">Strength:</span>
                                            <xsl:value-of select="SavingThrows/StrengthSave" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Dexterity:</span>
                                            <xsl:value-of select="SavingThrows/DexteritySave" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Constitution:</span>
                                            <xsl:value-of select="SavingThrows/ConstitutionSave" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Intelligence:</span>
                                            <xsl:value-of select="SavingThrows/IntelligenceSave" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Wisdom:</span>
                                            <xsl:value-of select="SavingThrows/WisdomSave" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Charisma:</span>
                                            <xsl:value-of select="SavingThrows/CharismaSave" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Hit Points</h2>
                                        <div class="attribute">
                                            <span class="attribute-label">Maximum:</span>
                                            <xsl:value-of select="HitPoints/Maximum" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Current:</span>
                                            <xsl:value-of select="HitPoints/Current" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Temporary:</span>
                                            <xsl:value-of select="HitPoints/Temporary" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Other Stats</h2>
                                        <div class="attribute">
                                            <span class="attribute-label">Armor Class:</span>
                                            <xsl:value-of select="ArmorClass" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Initiative:</span>
                                            <xsl:value-of select="Initiative" />
                                        </div>
                                        <div class="attribute">
                                            <span class="attribute-label">Speed:</span>
                                            <xsl:value-of select="Speed" />
                                        </div>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Equipment</h2>
                                        <xsl:for-each select="Equipment/Item">
                                            <div class="attribute">
                                                <span class="attribute-label">
                                                    <xsl:value-of select="Name" /> (<xsl:value-of
                                                        select="Quantity" />) </span>
                                            </div>
                                        </xsl:for-each>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Spells</h2>
                                        <xsl:for-each select="Spells/Spell">
                                            <div class="attribute">
                                                <span class="attribute-label">
                                                    <xsl:value-of select="Name" /> (Level: <xsl:value-of
                                                        select="Level" />, Prepared:<xsl:value-of
                                                        select="Prepared" />) </span>
                                            </div>
                                        </xsl:for-each>
                                    </div>
                                    <div class="section">
                                        <h2 class="section-header">Actions</h2>
                                        <form id="editForm{$index}" method="post"
                                            action="editChar.php"
                                            class="edit-form">
                                            <input type="hidden" name="index" value="{$index}" />
                                            <xsl:for-each
                                                select="*[self::Name or self::Class or self::Level or self::Race or self::Background or self::Alignment or self::ExperiencePoints or self::ArmorClass or self::Initiative or self::Speed]">
                                                <input type="text" name="{local-name()}" value="{.}"
                                                    class="" />
                                            </xsl:for-each>
                                            <button type="button"
                                                class="edit-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                                Edit</button>
                                            <button type="submit"
                                                class="save-button bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">
                                                Save</button>
                                        </form>
                                        <form id="deleteForm{$index}" method="post"
                                            action="deleteChar.php"
                                            class="delete-form">
                                            <input type="hidden" name="index" value="{$index}" />
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </xsl:for-each>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>