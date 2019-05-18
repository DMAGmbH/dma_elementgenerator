<?php
/*
Der "parseFrontendTemplate"-Hook wird bei der Aufbereitung eines Frontend-Templates ausgeführt.
Er übergibt Inhalt und Name des Templates als Argument und erwartet den geänderten Template-Inhalt
als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ParseFrontendTemplate extends \Widget
{
    public function parseFrontendTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'ce_text')
        {
            // Ausgabe modifizieren
        }

        return $strContent;
    }
}
