<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="./content/template.xsl" />
	<xsl:import href="./meta/template.xsl" />
	<xsl:template match="/">
		<html>
			<head>
				<xsl:apply-templates select="uvcms:view/uvcms:meta" />
				<link href="views/css/template.css" rel="stylesheet" />
				<link href="views/css/form.css" rel="stylesheet" />
				<link href="views/css/grid.css" rel="stylesheet" />
				<script src="views/js/test.js"><![CDATA[&nbsp]]></script>
			</head>
			<body>
				<div id="header">
					<h1>
						<a href="?c=home">
						<xsl:text>UVCMS XML Namespace: </xsl:text>						
						<xsl:value-of select="uvcms:view/uvcms:meta/uvcms:title" />
						</a>
					</h1>
				</div>
				<div id="content">					
					<xsl:apply-templates select="uvcms:view/uvcms:content" />
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>