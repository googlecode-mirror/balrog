<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"	
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="./content/template.xsl"/>	
	<xsl:import href="./meta/template.xsl"/>	
	<xsl:template match="/">
		<html>
			<head>				
				<xsl:apply-templates select="uvcms:view/uvcms:meta" />
				<script src="views/js/test.js"><![CDATA[&nbsp]]></script>
				<link href="views/css/form.css" rel="stylesheet" />
			</head>
			<body>
				<h1>UVCMS XML Namespace: Forms</h1>
				<h2><xsl:value-of select="uvcms:view/uvcms:meta/uvcms:title" /></h2>
				<xsl:apply-templates select="uvcms:view/uvcms:content" />
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>