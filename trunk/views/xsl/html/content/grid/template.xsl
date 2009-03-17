<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="field/template.xsl" />
	<xsl:import href="meta.xsl" />
	<xsl:template match="uvcms:grid">
		<table>
			<xsl:apply-templates />
		</table>
	</xsl:template>
</xsl:stylesheet>