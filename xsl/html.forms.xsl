<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method='html' version='1.0' encoding='UTF-8'
		indent='yes' />		
	<xsl:template match="form">
		<form>
			<xsl:attribute name="action">
				<xsl:value-of select="action" />
			</xsl:attribute>
			<xsl:apply-templates select="fields" />
		</form>
	</xsl:template>
	<xsl:template match="field">
		<label>
			<xsl:value-of select="label" />
		</label>
		<input>
			<xsl:attribute name="type">
				<xsl:value-of select="type" />
			</xsl:attribute>
			<xsl:attribute name="name">
				<xsl:value-of select="name" />
			</xsl:attribute>
		</input>
		<br />
	</xsl:template>
</xsl:stylesheet>