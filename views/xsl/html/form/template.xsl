<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="field/template.xsl" />
	<xsl:template match="uvcms:forms">
		<xsl:apply-templates select="uvcms:form" />
	</xsl:template>
	<xsl:template match="uvcms:form">
		<form method="POST">
			<xsl:attribute name="action">
				<xsl:value-of select="uvcms:action" />
			</xsl:attribute>
			<xsl:apply-templates select="uvcms:fields" />
		</form>
	</xsl:template>
</xsl:stylesheet>