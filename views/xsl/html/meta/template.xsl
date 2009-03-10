<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="call.xsl" />
	<xsl:template match="uvcms:meta">
		<title><xsl:value-of select="uvcms:title" /></title>
		<xsl:apply-imports  />		
	</xsl:template>
</xsl:stylesheet>