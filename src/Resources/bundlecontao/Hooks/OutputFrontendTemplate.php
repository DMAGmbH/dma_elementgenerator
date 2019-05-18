<?php
/*
Der "outputFrontendTemplate"-Hook wird bei der Ausgabe eines Frontend-Templates auf
dem Bildschirm ausgeführt. Er übergibt Inhalt und Name des Templates als Argument und
erwartet den geänderten Template-Inhalt als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class OutputFrontendTemplate extends \Widget
{
    public function outputFrontendTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'fe_page')
        {
            // Ausgabe modifizieren
        }

        return $strContent;
    }
}
