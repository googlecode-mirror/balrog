<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:template name="field.radio">
		<span>
			<label>
				<xsl:attribute name="for">
					<xsl:value-of select="uvcms:name"></xsl:value-of>
				</xsl:attribute>
				<xsl:value-of select="uvcms:label"></xsl:value-of>
				<xsl:text>: </xsl:text>
			</label>
		</span>
		<xsl:apply-templates select="uvcms:options" />
	</xsl:template>
</xsl:stylesheet>