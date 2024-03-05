<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="student.css"/>
      </head>
      <body>
        <h2>Studenti</h2>
        <table class="student-table">
          <tr>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Číslo</th>
            <th>Fakulta</th>
            <th>Email</th>
            <th>Telefon</th>
          </tr>
          <xsl:for-each select="studenti/student">
            <tr>
              <td><xsl:value-of select="@jmeno"/></td>
              <td><xsl:value-of select="@prijmeni"/></td>
              <td><xsl:value-of select="@studentske_cislo"/></td>
              <td><xsl:value-of select="@fakulta"/></td>
              <td><xsl:value-of select="kontaktni_udaje/email"/></td>
              <td><xsl:value-of select="kontaktni_udaje/telefon"/></td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>