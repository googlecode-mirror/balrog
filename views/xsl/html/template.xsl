<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"	
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="form/template.xsl"/>	
	<xsl:template match="/">
		<html>
			<head>
				<title><xsl:value-of select="uvcms:view/uvcms:title" /></title>
				<link rel="stylesheet" href="views/css/html.forms.css" />
			</head>
			<body>
				<h1>UVCMS XML Namespace: Forms</h1>
				<h2><xsl:value-of select="uvcms:view/uvcms:title" /></h2>
				<xsl:apply-templates select="uvcms:view/uvcms:form" />
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>