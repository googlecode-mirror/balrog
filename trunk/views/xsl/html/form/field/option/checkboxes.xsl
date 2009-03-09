<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:template name="checkboxes">
		<li>
			<label>
				<xsl:value-of select="uvcms:label"></xsl:value-of>
			</label>
			<input>
				<xsl:attribute name="type">
					<xsl:text>checkbox</xsl:text>
				</xsl:attribute>
				<xsl:attribute name="value">
					<xsl:value-of select="uvcms:value" />
				</xsl:attribute>
				<xsl:attribute name="name">
					<xsl:value-of select="../../uvcms:name" />
					<xsl:text>[]</xsl:text>
				</xsl:attribute>
			</input>
		</li>
	</xsl:template>
</xsl:stylesheet>