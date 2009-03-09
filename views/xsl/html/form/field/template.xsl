<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:uvcms="http://www.uvcms.com/forms"
	xmlns="http://www.w3.org/1999/xhtml">
	<xsl:import href="option/template.xsl" />
	<xsl:import href="checkboxes.xsl" />
	<xsl:import href="input.xsl" />
	<xsl:import href="radio.xsl" />
	<xsl:import href="select.xsl" />
	<xsl:import href="submit.xsl" />
	<xsl:import href="textarea.xsl" />
	<xsl:template match="uvcms:fields">
		<xsl:apply-templates select="uvcms:field" />
	</xsl:template>
	<xsl:template match="uvcms:field">
		<xsl:choose>
			<xsl:when test="uvcms:type='textarea'">
				<xsl:call-template name="field.textarea" />
			</xsl:when>
			<xsl:when test="uvcms:type='submit'">
				<xsl:call-template name="field.submit" />
			</xsl:when>
			<xsl:when test="uvcms:type='radio'">
				<xsl:call-template name="field.radio" />
			</xsl:when>
			<xsl:when test="uvcms:type='checkboxes'">
				<xsl:call-template name="field.checkboxes" />
			</xsl:when>
			<xsl:when test="uvcms:type='select'">
				<xsl:call-template name="field.select" />
			</xsl:when>
			<xsl:otherwise>
				<xsl:call-template name="field.input" />
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
</xsl:stylesheet>
