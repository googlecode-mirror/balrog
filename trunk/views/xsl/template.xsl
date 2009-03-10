<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views">
	<xsl:import href="html/template.xsl"/>
	<xsl:template match="/">
		<html>
			<head>
				<title><xsl:value-of select="uvcms:view/uvcms:title" /></title>
				<link rel="stylesheet" href="../css/html.forms.css"></link>
			</head>
			<body>
				<h1><xsl:value-of select="uvcms:view/uvcms:title" /></h1>
				<xsl:apply-templates></xsl:apply-templates>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>