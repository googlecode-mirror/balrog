<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:template name="select">
		<option>
			<xsl:attribute name="value">
				<xsl:value-of select="uvcms:value">
					</xsl:value-of>
				</xsl:attribute>
			<xsl:value-of select="uvcms:label"></xsl:value-of>
		</option>
	</xsl:template>
</xsl:stylesheet>