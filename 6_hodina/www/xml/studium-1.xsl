<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >

  <xsl:template match="/">
    <html>
      <body>
        <xsl:apply-templates select="//predmet"/>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="predmet">
    <p>
      <xsl:value-of select="@katedra"/>/<xsl:value-of select="@kod"/>
      <xsl:text> </xsl:text>
      <xsl:value-of select="nazev"/>
    </p>
  </xsl:template>

</xsl:stylesheet>