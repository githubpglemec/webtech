<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
    <head>
      <title>Book Details</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          margin: 20px;
        }

        h2 {
          color: #333;
        }

        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
        }

        th, td {
          border: 1px solid #ddd;
          padding: 10px;
          text-align: left;
        }

        th {
          background-color: #f2f2f2;
        }
      </style>
    </head>
    <body>
      <h2>Book Details</h2>
      <table>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
        </tr>
        <xsl:for-each select="library/book">
          <tr>
            <td><xsl:value-of select="title"/></td>
            <td><xsl:value-of select="author"/></td>
            <td><xsl:value-of select="price"/></td>
          </tr>
        </xsl:for-each>
      </table>
    </body>
  </html>
</xsl:template>

</xsl:stylesheet>
