<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:template match="uvcms:options">
		<xsl:apply-templates select="uvcms:option" />
	</xsl:template>
	<xsl:template match="uvcms:option">
		<xsl:choose>
			<xsl:when test="../../uvcms:type='select'">
				<option>
					<xsl:attribute name="value">
						<xsl:value-of select="uvcms:value">
						</xsl:value-of>
					</xsl:attribute>
					<xsl:value-of select="uvcms:label">
					</xsl:value-of>
				</option>
			</xsl:when>
			<xsl:when test="../../uvcms:type='checkboxes'">
				<span>
					<label>
						<xsl:value-of select="uvcms:label">
						</xsl:value-of>
					</label>
					<input>
						<xsl:attribute name="type">
							<xsl:text>checkbox</xsl:text>
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
			</xsl:when>
			<xsl:otherwise>
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
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>

