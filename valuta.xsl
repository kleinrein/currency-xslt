<?xml version="1.0" encoding="UTF-8"?>
    <xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
        <xsl:variable name="newline">
            <xsl:text> </xsl:text>
        </xsl:variable>

        <xsl:template match="/">
            <p>
                <div id="wrapper">
                    <div id="inputForm">
                        <label>Fra</label>
                        <select id="valuta" class="chosen">
                            <xsl:apply-templates select="valuta" mode="optionTil" />
                        </select>
                        <br></br>
                        <input id="verdi" type="number" value="0" step="50"></input>
                        <p id="konvertering">0 NOK</p>
                    </div>

                    <p id="valutaliste">
                        <xsl:apply-templates select="valuta" />
                    </p>
                    
                    <input type="checkbox" title="Veksle valutaliste" id="tableSwitch" class="js-switch" />
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Land</th>
                                <th>Enhet</th>
                                <th>Kjøp</th>
                                <th>Salg</th>
                            </tr>
                        </thead>
                        <xsl:apply-templates select="valuta/valutakurs" mode="table" />
                    </table>
                </div>
            </p>
        </xsl:template>

        <xsl:template match="valuta">
            <xsl:value-of select="overskrift" />
            <br></br>
            <xsl:value-of select="substring(oppdatert, 0, 11)" />
        </xsl:template>

        <xsl:template match="valutakurs" mode="optionTil">
            <xsl:if test="overforsel/kjop != '0'">
                <option>
                    <xsl:value-of select="kode" />
                    <xsl:value-of select="$newline" />
                    <xsl:value-of select="navn" />
                </option>
            </xsl:if>
        </xsl:template>

        <xsl:template match="valuta/valutakurs" mode="table">
            <xsl:if test="overforsel/kjop != '0'">
                <tbody>
                    <tr>
                        <td>
                            <xsl:value-of select="kode" />
                        </td>
                        <td>
                            <xsl:value-of select="land" />
                        </td>
                        <td>
                            <xsl:value-of select="enhet" />
                        </td>
                        <td>
                            <xsl:value-of select="overforsel/kjop" />
                        </td>
                        <td>
                            <xsl:value-of select="overforsel/salg" />
                        </td>
                    </tr>
                </tbody>
            </xsl:if>
        </xsl:template>
    </xsl:stylesheet>