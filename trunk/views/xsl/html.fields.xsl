<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:uvcms="http://www.uvcms.com/forms">
	<xsl:import href="html.options.xsl" />
	<xsl:template match="uvcms:fields">
		<xsl:apply-templates select="uvcms:field" />
	</xsl:template>
	<xsl:template match="uvcms:field">
		<xsl:choose>			
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
							</xsl:value-of>
						</xsl:attribute>
					</input>
				</span>
			</xsl:when>
			<xsl:when test="uvcms:type='radio'">
				<span>
					<label>
						<xsl:attribute name="for">
							<xsl:value-of select="uvcms:name"></xsl:value-of>
						</xsl:attribute>
						<xsl:value-of select="uvcms:label"></xsl:value-of>
					</label>
				</span>
				<xsl:apply-templates select="uvcms:options" />
			</xsl:when>
			<xsl:when test="uvcms:type='checkboxes'">
				<span>
					<label>
						<xsl:attribute name="for">
							<xsl:value-of select="uvcms:name"></xsl:value-of>
						</xsl:attribute>
						<xsl:value-of select="uvcms:label"></xsl:value-of>
					</label>
				</span>
				<xsl:apply-templates select="uvcms:options" />
			</xsl:when>
			<xsl:when test="uvcms:type='select'">
				<span>
					<label>
						<xsl:attribute name="for">
							<xsl:value-of select="uvcms:name"></xsl:value-of>
						</xsl:attribute>
						<xsl:value-of select="uvcms:label"></xsl:value-of>
					</label>
				</span>
				<select>
					<xsl:attribute name="name">
						<xsl:value-of select="uvcms:name" />
					</xsl:attribute>
					<xsl:apply-templates select="uvcms:options" />
				</select>
			</xsl:when>
			<xsl:otherwise>
				<span>
					<label>
						<xsl:attribute name="for">
							<xsl:value-of select="uvcms:name"></xsl:value-of>
						</xsl:attribute>
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
	</xsl:template>
</xsl:stylesheet>
