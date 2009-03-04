<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">	
	<xsl:template match="/">
		<html>
			<head>
				<title>
					<xsl:value-of select="html/head/title" />
				</title>
				<xsl:for-each select="html/head/script">
					<xsl:copy-of select="self::*" />
				</xsl:for-each>
				<xsl:for-each select="html/head/link">
					<xsl:copy-of select="self::*" />
				</xsl:for-each>
			</head>
			<body>
				<h1>Header de mi template.</h1>
				<xsl:copy-of select="html/body/*" />
			</body>
		</html>
	</xsl:template>	
</xsl:stylesheet>