<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/views"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:template match="uvcms:call">
		<xsl:choose>
			<xsl:when test="@type='script'">
				<script>
					<xsl:attribute name="src">
						<xsl:value-of select="@source" />
					</xsl:attribute>
					<xsl:comment>We need the snippet below to avoid browser conficts with the script tag.</xsl:comment>
					<xsl:text><![CDATA[&nbsp]]></xsl:text>
				</script>
			</xsl:when>
			<xsl:when test="@type='css'">
				<link>
					<xsl:attribute name="rel">
						<xsl:text>stylesheet</xsl:text>
					</xsl:attribute>
					<xsl:attribute name="href">
						<xsl:value-of select="@source" />
					</xsl:attribute>
				</link>
			</xsl:when>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>