<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:template name="field.submit">
		<span>
			<input>
				<xsl:attribute name="type">
							<xsl:value-of select="uvcms:type" />
						</xsl:attribute>
				<xsl:attribute name="name">
							<xsl:value-of select="uvcms:name" />
						</xsl:attribute>
				<xsl:attribute name="value">
							<xsl:value-of select="uvcms:label">
							</xsl:value-of>
						</xsl:attribute>
			</input>
		</span>
	</xsl:template>
</xsl:stylesheet>