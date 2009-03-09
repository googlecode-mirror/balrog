<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:import href="html.forms.xsl"/>
	<xsl:template match="/">
		<html>
			<head>
				<title>UVCMS XML Namespace</title>
				<link rel="stylesheet" href="../css/html.forms.css"></link>
			</head>
			<body>
				<h1>UVCMS XML Namespace</h1>
				<xsl:apply-templates></xsl:apply-templates>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>