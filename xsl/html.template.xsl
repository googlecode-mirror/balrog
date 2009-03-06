<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method='html' version='1.0' encoding='UTF-8'
		indent='yes' />
	<xsl:include href="html.forms.xsl" />
	<xsl:template match="/">
		<html>
			<head>
				<title>Forms demonstration</title>
			</head>
			<body>
				<h1>Forms</h1>
				<div>
					<xsl:apply-templates select="forms" />
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>