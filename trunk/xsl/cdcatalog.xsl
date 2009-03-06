<?xml version="1.0" encoding="ISO-8859-1"?>
<!-- Edited by XMLSpy® -->
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method='html' version='1.0' encoding='UTF-8'
		indent='yes' />
	<xsl:template match="/">
		<html>
			<head>
				<title>Ejemplo XML</title>
				<link rel="alternate" media="print" href="test.txt"
					type="text/html" />
				<script>alert('Hola Carmen');</script>
			</head>
			<body>
				<h2>My CD Collection</h2>
				<table border="1">
					<tr bgcolor="#FFFFFF">
						<th align="left">Titulo</th>
						<th align="left">Artista</th>
						<th>Country</th>
					</tr>
					<xsl:for-each select="catalog/cd">
						<tr>
							<xsl:attribute name="id">
								<xsl:text>p</xsl:text>								
								<xsl:value-of select="position()" />
							</xsl:attribute>
							<td>
								<xsl:value-of select="position()" />
								<xsl:text> - </xsl:text>
								<xsl:value-of select="title" />
							</td>
							<td>
								<xsl:value-of select="artist" />
							</td>
							<td>
								<xsl:value-of select="country" />
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>