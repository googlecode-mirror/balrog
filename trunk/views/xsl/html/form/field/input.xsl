<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:template name="field.input">
		<span>
			<label>
				<xsl:attribute name="for">
							<xsl:value-of select="uvcms:name"></xsl:value-of>
						</xsl:attribute>
				<xsl:value-of select="uvcms:label"></xsl:value-of>
				<xsl:text>: </xsl:text>
			</label>
			<input>
				<xsl:attribute name="type">
							<xsl:value-of select="uvcms:type" />
						</xsl:attribute>
				<xsl:attribute name="name">
							<xsl:value-of select="uvcms:name" />
						</xsl:attribute>
			</input>
		</span>
	</xsl:template>
</xsl:stylesheet>