<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<xsl:output method="html" version="4" encoding="iso-8859-1" indent="yes"/>
	<xsl:template match="channel">
    <html>
       	<head>
        	<title><xsl:value-of select="title"/> - <xsl:value-of select="description"/></title>
<style type="text/css">
body {
    font-family:"Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
    font-size:10pt; 
    color: #c1c1c1;
    background: #212121;
    }

td {
    font-family:"Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
    font-size:10pt; 
    border: solid 1px; 
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 6px;
    padding-bottom: 6px;
    border-bottom-color: #111111;
    border-right-color: #111111;
    border-top-color: #363636;
    border-left-color: #363636;
    }

.news {
    background-color: #232323;
    }

.news:hover {
    background-color: #292929;
    }

a img {
    border: none;
    }

a {
    color: #2058FF;
    text-decoration: none;
    }

a:hover {
    color: #3D8CFF;
    }
    
</style>
        	<meta http-equiv="refresh" content="3600"/>
       	</head>
       	<body>
        <div align="center">
					<table width="80%">
            <tr>
            	<td align="center" style="border: none !important;">
                <a href="{link}"><big><big><b><img src="{image/url}" alt="" height="150px" /></b></big></big></a><br/>
            	</td>
            	
            	<td style="border: none !important">
            	<b><big><xsl:value-of select="description"/></big></b><br/>
            	<br/>
            	<a href="http://validator.w3.org/feed/check.cgi?url=referer"><img src="valid-rss.png" alt="[Valid RSS]" title="Validate my RSS feed"/></a><br/>
            	Cette page est au format RSS 2.0. <br/>
            	Elle est conçue pour être lue par des aggrégateurs de flux RSS.<br/>
            	<br/> 
            	</td>
          	</tr>
			<xsl:call-template name="item"/>
			</table>   
        	<b><a href="" target="_self"><small>[Recharger cette page]</small></a></b>   
       	</div>
    </body>
    </html>
	</xsl:template>

	<xsl:template match="item" name="item">
		<xsl:for-each select="item">
		<tr>
		<td colspan="2" class="news">
			<a href="{link}" target="_blank"><b><xsl:value-of select="title"/></b></a>
	    <br/>
	    <xsl:value-of select="description"/>
		<br />
		<div  style="text-align: right"><small><i><xsl:value-of select="pubDate"/></i></small></div>
	    </td>
	    </tr>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
