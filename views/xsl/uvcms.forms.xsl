<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:template match="/">
		<html>
			<head>
				<title>UVCMS XML Namespace</title>
				<link rel="stylesheet" href="http://localhost/balrog/views/css/html.forms.css"></link>
			</head>
			<body>
				<h1>UVCMS XML Namespace</h1>
				<xsl:apply-templates></xsl:apply-templates>
			</body>
		</html>
	</xsl:template>
	<xsl:template match="uvcms:forms">
		<xsl:for-each select="uvcms:form">
			<form>
				<xsl:attribute name="action">
					<xsl:value-of select="uvcms:action" />
				</xsl:attribute>
				<xsl:apply-templates></xsl:apply-templates>
			</form>
		</xsl:for-each>
	</xsl:template>
	<xsl:template match="uvcms:fields">
		<xsl:for-each select="uvcms:field">
			<xsl:choose>
				<xsl:when test="uvcms:type='checkboxes'">
				</xsl:when>
				<xsl:when test="uvcms:type='submit'">

					<span>
						<input>
							<xsl:attribute name="type">
									<xsl:value-of select="uvcms:type" />
								</xsl:attribute>
							<xsl:attribute name="name">
									<xsl:value-of select="uvcms:name" />
								</xsl:attribute>
							<xsl:attribute name="value">
											<xsl:value-of select="uvcms:label">
											</xsl:value-of></xsl:attribute>
						</input>
					</span>
				</xsl:when>
				<xsl:when test="uvcms:type='radio'">
					<span>
						<label>
							<xsl:attribute name="for"></xsl:attribute>
							<xsl:value-of select="uvcms:label"></xsl:value-of>
						</label>
					</span>
					<xsl:apply-templates></xsl:apply-templates>
				</xsl:when>
				<xsl:otherwise>


					<span>
						<label>
							<xsl:attribute name="for">
								<xsl:value-of select="uvcms:name"></xsl:value-of></xsl:attribute>
							<xsl:value-of select="uvcms:label"></xsl:value-of>
							<xsl:text>: </xsl:text>
						</label>
						<input>
							<xsl:attribute name="type">
									<xsl:value-of select="uvcms:type" />
								</xsl:attribute>
							<xsl:attribute name="name">
									<xsl:value-of select="uvcms:name" />
								</xsl:attribute>
						</input>
					</span>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:for-each>
	</xsl:template>
	<xsl:template match="uvcms:options">
		<xsl:for-each select="uvcms:option">
			<span>
				<label>
					<xsl:value-of select="uvcms:label">
					</xsl:value-of>
				</label>
				<input>
					<xsl:attribute name="type">
													<xsl:value-of select="../../uvcms:type">
													</xsl:value-of>
												</xsl:attribute>
					<xsl:attribute name="value">
													<xsl:value-of select="uvcms:value">
													</xsl:value-of>
												</xsl:attribute>
					<xsl:attribute name="name">
													<xsl:value-of select="../../uvcms:name">
													</xsl:value-of>
												</xsl:attribute>
				</input>
			</span>
		</xsl:for-each>
	</xsl:template>

</xsl:stylesheet>