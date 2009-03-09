<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:template name="field.checkboxes">
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