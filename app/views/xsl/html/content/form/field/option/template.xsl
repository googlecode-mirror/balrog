<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="radio.xsl" />
	<xsl:import href="select.xsl" />
	<xsl:import href="checkboxes.xsl" />
	<xsl:template match="uvcms:options">
		<xsl:apply-templates select="uvcms:option" />
	</xsl:template>
	<xsl:template match="uvcms:option">
		<xsl:choose>
			<xsl:when test="../../uvcms:type='select'">
				<xsl:call-template name="select" />
			</xsl:when>
			<xsl:when test="../../uvcms:type='checkboxes'">
				<ul>
					<xsl:call-template name="checkboxes" />
				</ul>
			</xsl:when>
			<xsl:otherwise>
				<ul>
					<xsl:call-template name="option.radio" />
				</ul>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>	
</xsl:stylesheet>