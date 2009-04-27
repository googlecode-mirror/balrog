<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views"
 xmlns="http://www.w3.org/1999/xhtml">
    <xsl:template match="uvcms:grid">
        <table>
            <thead>
                <tr>
                    <xsl:for-each select="uvcms:columns/uvcms:column">
                        <th>
                            <xsl:value-of select="uvcms:label"/>
                        </th>
                    </xsl:for-each>
                </tr>
            </thead>
            <tbody>
                <xsl:for-each select="uvcms:rows/uvcms:row">
                    <tr>
                        <xsl:for-each select="uvcms:value">
                            <td>
                                <xsl:value-of select="self::*"/>
                            </td>
                        </xsl:for-each>
                    </tr>
                </xsl:for-each>
            </tbody>
        </table>
    </xsl:template>
</xsl:stylesheet>
