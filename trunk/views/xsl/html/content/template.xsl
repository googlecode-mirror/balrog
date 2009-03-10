<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"	
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="form/template.xsl"/>	
	<xsl:template match="uvcms:content">
		<div id="content">
			<xsl:apply-templates />
		</div>
	</xsl:template>
</xsl:stylesheet>