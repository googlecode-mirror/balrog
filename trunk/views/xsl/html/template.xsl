<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views">
	<xsl:import href="form/template.xsl"/>	
	<xsl:template match="/">
		<html>
			<head>
				<title>UVCMS XML Namespace: Forms</title>
				<link rel="stylesheet" href="views/css/html.forms.css" />
			</head>
			<body>
				<h1>UVCMS XML Namespace: Forms</h1>
				<xsl:apply-templates />
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>